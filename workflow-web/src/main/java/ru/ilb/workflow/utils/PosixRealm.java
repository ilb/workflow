package ru.ilb.workflow.utils;

/**
 *
 * @author valeev
 */
import java.io.*;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;
import org.apache.juli.logging.Log;
import org.apache.juli.logging.LogFactory;

public class PosixRealm {

    private static final Log LOG = LogFactory.getLog(PosixRealm.class);

    // memory cache
    private static final HashMap<String, String> NAME_CACHE = new HashMap<String, String>();

    private static String passwdFilename = "/etc/passwd";

    private static String passwdcacheFilename = "/etc/passwd.cache";

    private final static Map<String, Character> replaceMap = new LinkedHashMap();

    static {
        String[] search = new String[]{"shh", "Shh", "yo", "zh", "ch", "sh", "``", "y`", "e`", "yu", "ya", "Yo", "Zh", "Ch", "Sh", "Y`", "E`", "Yu", "Ya", "a", "b", "v", "g", "d", "e", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "x", "c", "`", "A", "B", "V", "G", "D", "E", "Z", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "X", "C"};
        Character[] replace = new Character[]{'щ', 'Щ', 'ё', 'ж', 'ч', 'ш', 'ъ', 'ы', 'э', 'ю', 'я', 'Ё', 'Ж', 'Ч', 'Ш', 'Ы', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ь', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц'};
        for (int i = 0; i < search.length; i++) {
            replaceMap.put(search[i], replace[i]);
        }
    }

    public static String getFioByUser(String user) {
        String fio = null;
        String result = null;

        if (NAME_CACHE.containsKey(user) == false) {
            fio = readFio(passwdFilename, user);
            if (fio == null) {
                fio = readFio(passwdcacheFilename, user);
            }
            if (fio == null) {
                LOG.warn("  user not found '" + user + "'");
            }
            synchronized (NAME_CACHE) {
                NAME_CACHE.put(user, fio);
            }
        }
        fio = NAME_CACHE.get(user);
        if (fio != null) {
            result = fio;
        }
        if (LOG.isDebugEnabled()) {
            LOG.debug("  result for '" + user + "' =" + result + " " + (fio != null ? "cached" : ""));
        }

        return result;
    }

    private static String readFio(String filename, String user) {
        String fio = null;
        try {
            FileInputStream fstream = new FileInputStream(filename);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));
            String strLine;
            while ((strLine = br.readLine()) != null) {
                if (strLine.startsWith(user + ":")) {
                    int endIndex = strLine.lastIndexOf(":", strLine.lastIndexOf(":") - 1);
                    String[] members = strLine.substring(strLine.lastIndexOf(":", endIndex - 1) + 1, endIndex).split(" ");
                    fio = members[members.length - 1] + " ";
                    for (int i = 0; i < members.length - 1; i++) {
                        fio += members[i] + " ";
                    }
                    fio = transliterateInRus(fio.trim());
                    if (LOG.isDebugEnabled()) {
                        LOG.debug("  read fio '" + fio);
                    }
                    break;
                }
            }
            in.close();
            br.close();
            fstream.close();
        } catch (IOException e) {
            LOG.warn("  readFio error:" + e.getMessage(), e);
            System.err.println("readFio error: " + e.getMessage());
        }
        return fio;
    }

    private static String transliterateInRus(String s) {
        for (Map.Entry<String, Character> entry : replaceMap.entrySet()) {
            s = s.replaceAll(entry.getKey(), entry.getValue().toString());
        }
        return s;
    }
}
