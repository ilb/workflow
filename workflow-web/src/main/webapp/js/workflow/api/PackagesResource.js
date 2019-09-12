/*global fetch */
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
function workflow_api_PackagesResource(baseAddress) {
    this.baseAddress = baseAddress;

    this.disableProcessDefinition = function (packageId, processDefinitionId) {
        var url = this.baseAddress + "/" + encodeURIComponent(packageId) + "/processDefinitions/" + encodeURIComponent(processDefinitionId) + "/disable";
        var opts = {
            method: 'post'
        };
        return fetch(url, opts);
    };

}
;
