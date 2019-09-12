/*global xtag, WadlClient */
/**
 * Copyright (C) 2015 Bystrobank, JSC
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 *
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see http://www.gnu.org/licenses
 */
(function () {

    var packagesResource = null;

    document.querySelector("#packagesForm").addEventListener("submitted", function (event) {
        var request = event.detail.request;
        //alert(JSON.stringify(event.detail.data, null, 4));
        if (request.status < 400) {
            var location = request.getResponseHeader("Location");
            if (location) {
                document.location = location;
            } else {
                var webrootpath = document.location.toString().substr(0, document.location.toString().indexOf("/workflow/") + 9);
                document.location = webrootpath + "/web/processes/workList";
            }
        } else {
            alert(request.responseText);
        }
    }
    );

    function disableProcessDefinition(event) {
        // replace # with ^ for url
        var definitionId = event.target.value; //.replace(/#/g,'^');
        var packageId = event.target.value.split("#")[0];
        //alert(value);
        packagesResource.disableProcessDefinition(packageId, definitionId)
                .then(workflow_lib_Common.checkStatus)
                .then(workflow_lib_Common.reloadWindow)
                .catch(workflow_lib_Common.errorHandler);
    }

    window.addEventListener('load', function () {
        var baseAddress = document.location.toString().substr(0, document.location.toString().indexOf("/workflow/") + 13) + "/packages";
        packagesResource = new workflow_api_PackagesResource(baseAddress);

        var buttons = document.querySelectorAll(".disableProcessDefinition");
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            button.onclick = disableProcessDefinition;
        }


    });

}());
