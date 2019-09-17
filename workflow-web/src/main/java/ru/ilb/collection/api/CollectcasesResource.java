/**
 * Created by Apache CXF WadlToJava code generator
 * */
package ru.ilb.collection.api;

import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.Response;
import java.util.Date;
import java.util.UUID;

/**
 * collectcases resource
 */
@Path("collectcases")
public interface CollectcasesResource {

    /**
     * @param uid collectcase uid
     */
    @POST
    @Produces("text/plain")
    @Path("/{uid}/setNextActivityDate")
    Response setNextActivityDate(@PathParam("uid") UUID uid, @QueryParam("nextActivityDate") Date nextActivityDate, @QueryParam("forcibly") Boolean forcibly);

    /**
     * @param uid collectcase uid
     */
    @POST
    @Produces("text/plain")
    @Path("/{uid}/setLastActivityDate")
    Response setLastActivityDate(@PathParam("uid") UUID uid, @QueryParam("lastActivityDate") Date lastActivityDate);

    /**
     * @param uid collectcase uid
     */
    @POST
    @Produces("text/plain")
    @Path("/{uid}/setLastActivityCommentDate")
    Response setLastActivityCommentDate(@PathParam("uid") UUID uid, @QueryParam("lastActivityCommentDate") Date lastActivityCommentDate);
}
