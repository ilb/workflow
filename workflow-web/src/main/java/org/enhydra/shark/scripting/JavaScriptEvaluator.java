/**
 * Together Workflow Server
 * Copyright (C) 2011 Together Teamsolutions Co., Ltd.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses
 */

package org.enhydra.shark.scripting;

import java.util.Iterator;
import java.util.Map;

import org.enhydra.shark.api.RootException;
import org.enhydra.shark.api.client.wfmc.wapi.WMSessionHandle;
import org.enhydra.shark.api.internal.scripting.Evaluator;
import org.enhydra.shark.api.internal.working.CallbackUtilities;
import org.enhydra.shark.utilities.misc.MiscUtilities;
import org.mozilla.javascript.Scriptable;

/**
 * Implementation of the Evaluator interface which evaluates the condition body as a java
 * script expression.
 */
public class JavaScriptEvaluator implements Evaluator {

   protected static final String LOG_CHANNEL = "Scripting";

   protected CallbackUtilities cus;

   public void configure(CallbackUtilities cus) throws Exception {
      this.cus = cus;
   }

   /**
    * Evaluate the condition using java script as the expression language. This method
    * returns true if the condition is satisfied.
    *
    * @param condition The condition
    * @param context The context
    * @return True if the condition is true
    */
   public boolean evaluateCondition(WMSessionHandle shandle, String procId, String actId, String condition, Map context) throws Exception {
      if (condition == null || condition.trim().length() == 0) {
         return true;
      }

      java.lang.Object eval = evaluateExpression(shandle, procId, actId, condition, context, java.lang.Boolean.class);
      try {
         return ((Boolean) eval).booleanValue();
      } catch (Exception ex) {
         cus.error(shandle, LOG_CHANNEL, "JavaScriptEvaluator -> The result of condition " + condition + " cannot be converted to boolean", ex);
         cus.error(shandle, "JavaScriptEvaluator -> The result of condition " + condition + " cannot be converted to boolean");
         throw ex;
      }

   }

   /**
    * Evaluates the given expression.
    *
    * @param expr The expression String
    * @param context The workflow context
    * @param resultClass Returned object should be the instance of this Java class
    * @return The result of expression evaluation.
    */
   public java.lang.Object evaluateExpression(WMSessionHandle shandle, String procId, String actId, String expr, Map context, Class resultClass)
      throws Exception {
      long tStamp = cus != null ? cus.methodStart(shandle, "JavaScriptEvaluator.evaluateExpression") : -1;
      boolean jsinitialized = false;
      try {
         Object ret = MiscUtilities.fastExpressionEvaluation(expr, context, resultClass);
         if (ret != null) {
            return ret;
         }

         org.mozilla.javascript.Context cx = org.mozilla.javascript.Context.enter();
         jsinitialized = true;
         Scriptable scope = cx.initStandardObjects(null);

         java.lang.Object eval;
         expr = prepareContext(shandle, scope, expr, context, procId, actId);
         if (resultClass != null) {
            //FIX dates
            if (resultClass.equals(java.sql.Date.class)) {
                resultClass = java.util.Date.class;
            }
            eval = org.mozilla.javascript.Context.toType(cx.evaluateString(scope, expr, "", 1, null), resultClass);
            //FIX dates
            if (eval.getClass().equals(java.util.Date.class)) {
                eval = new java.sql.Date(((java.util.Date) eval).getTime());
            }
         } else {
            eval = cx.evaluateString(scope, expr, "", 1, null);
         }
         cus.debug(shandle, LOG_CHANNEL, "JavaScriptEvaluator -> Javascript expression " + expr + " is evaluated to " + eval);
         return eval;

      } catch (Throwable ex) {
         cus.error(shandle,
                   LOG_CHANNEL,
                   "JavaScriptEvaluator -> The result of expression " + expr + " can't be evaluated - error message=" + ex.getMessage(),
                   ex);
         cus.error(shandle, "JavaScriptEvaluator -> The result of expression " + expr + " can't be evaluated - error message=" + ex.getMessage());
         if (ex instanceof Exception) {
            throw (Exception) ex;
         }
         throw new RootException("Result cannot be evaluated", ex);
      } finally {
         if (jsinitialized) {
            org.mozilla.javascript.Context.exit();
         }
         if (cus != null) {
            cus.methodEnd(shandle, tStamp, "JavaScriptEvaluator.evaluateExpression", "expression: " + (expr != null ? expr.replace("\n", " ") : expr));
         }
      }
   }

   protected String prepareContext(WMSessionHandle shandle, Scriptable scope, String expr, Map context, String procId, String actId) throws Exception {
      String newExpr = adjustExpression(shandle, expr, context, procId, actId);

      Iterator iter = context.entrySet().iterator();
      while (iter.hasNext()) {
         Map.Entry me = (Map.Entry) iter.next();
         String key = me.getKey().toString();
         java.lang.Object value = me.getValue();
         scope.put(key, scope, value);
      }

      return newExpr;
   }

   protected String adjustExpression(WMSessionHandle shandle, String expression, Map context, String procId, String actId) throws Exception {
      return expression;
   }

}
