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
    window.addEventListener('load', function () {
        var buttons = document.querySelectorAll("button.remove-element");
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            button.onclick = function () {
                onClickRemoveButton(this);
            };
        }
        buttons = document.querySelectorAll("button.add-element");
        for (var i = 0; i < buttons.length; i++) {
            var button = buttons[i];
            button.addEventListener('click', function () {
                var inpId = this.parentNode.querySelector("input[type=hidden]");
                var prefix = inpId.name.replace(/\[@Id\]$/, "");
                var ol = this.parentNode.querySelector("ol");
                //alert(prefix);
                var elementLi = document.createElement("li");
                var input = document.createElement("input");
                input.tyle = "text";
                input.className = "pure-input-1-2";
                input.name = prefix + "[StringValue][" + (ol.getElementsByTagName("li").length) + "][@Value]";
                elementLi.appendChild(input);
                elementLi.appendChild(document.createTextNode("\n"));
                var btn = document.createElement("button");
                btn.type = "button";
                btn.className = "pure-button remove-element";
                btn.innerHTML = " - ";
                btn.onclick = function () {
                    onClickRemoveButton(this);
                };
                elementLi.appendChild(btn);
                ol.appendChild(elementLi);
            });
        }
    });


    function onClickRemoveButton(button) {
        if (button !== null) {
            var inputs = button.closest("ol").getElementsByTagName("input");
            button.closest("ol").removeChild(button.closest("li"));
            for (var j = 0; j < inputs.length; j++) {
                var input = inputs[j];
                input.name = "ManualActivityInstance[DataInstances][StringArrayDataInstance][0][StringValue][" + j + "][@Value]";
            }
        }
    }

}());
