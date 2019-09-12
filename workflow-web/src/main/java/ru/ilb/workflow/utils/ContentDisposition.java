package ru.ilb.workflow.utils;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;
import javax.ws.rs.core.Response.ResponseBuilder;

/**
 * Кроссбраузерная отдавалка файлов. Умеет передать имя скачиваемого файла по-русски, с пробелами и пр. Поддерживает работу с mod_xsendfile. Тестирован с Mozilla-ми, Opera, IE,
 * Chrome, Safari.
 *
 * @link http://greenbytes.de/tech/tc2231/
 * @link http://www.faqs.org/rfcs/rfc2231.html
 * @link http://www.ietf.org/rfc/rfc2183.txt
 * @link http://moinmo.in/MoinMoinBugs/Non-ASCII%20attachment%20names%20corrupted%20on%20download
 *
 * @author eav
 */
public final class ContentDisposition {

    public final static String DISPOSITION_ATTACHMENT = "attachment";
    public final static String DISPOSITION_INLINE = "inline";
    //небезопасные символы для имени аттача
    private final static char[] unsafe = {'"', 'ё', 'Ё', '№', '\\', '/', ':'};
    //набор безопасных символов для замены
    private final static char[] safe = {'\'', 'е', 'Е', 'N', '-', '-', '-'};

    /* Приватный конструктор, чтобы не инстанцировали и не наследовали */
    private ContentDisposition() {

    }

    /**
     * Кодирует имя файла
     *
     * @param attachmentName имя файла
     * @param charset кодировка
     * @return закодированное имя файла
     * @throws UnsupportedEncodingException
     */
    private static String encodeAttachmentName(String attachmentName, String charset) throws UnsupportedEncodingException {
        for (int i = 0; i < unsafe.length; i++) {
            attachmentName = attachmentName.replace(String.valueOf(unsafe[i]), String.valueOf(safe[i]));
        }
        return URLEncoder.encode(attachmentName, charset);
    }

    public static ResponseBuilder attachmentStr(ResponseBuilder responseBuilder, int contentLength, String contentType, String attachmentName, String disposition, String charset) throws UnsupportedEncodingException {
        if (0 < attachmentName.length()) {
            responseBuilder.header("Content-Disposition", getContentDispositionHeader(disposition, attachmentName, charset));

        }
        responseBuilder.header("Content-Type", contentType);
        responseBuilder.header("Content-Length", contentLength);
        return responseBuilder;
    }

    public static String getContentDispositionHeader(String disposition, String attachmentName, String charset) throws UnsupportedEncodingException {
        //нормализуем и кодируем имя аттача
        attachmentName = encodeAttachmentName(attachmentName, charset);
        //указываем аттач по rfc. его понимают mozilla и opera, остальные из урла имя подберут
        return disposition + "; filename*=UTF-8''" + attachmentName;
    }
}
