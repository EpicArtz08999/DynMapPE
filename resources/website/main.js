"use strict";
var requiredFilesLeft = 2;
var terrainImg, terrainMeta;
function loadHandler() {
	terrainImg = new Image();
	terrainImg.onload = loadedFile;
	terrainImg.src = "terrain-atlas.png";
	var terrainMetaRequest = new XMLHttpRequest();
	terrainMetaRequest.onload = function() {
		terrainMeta = JSON.parse(<?php=file_get_contents("terrain.meta");?>);
		loadedFile();
	};
}

function loadedFile() {
	requiredFilesLeft--;
	if (requiredFilesLeft <= 0) {
		buildTable();
	}
}

function buildTable() {
	var mainTable = document.createElement("table");
	var divider = document.createElement("tr");
	divider.innerHTML = "<td>BLOCKS</td>";
	mainTable.appendChild(divider);
	for (var i = 0; i < terrainMeta.length; i++) {
		buildTableRow(mainTable, "terrain-atlas.png", terrainMeta[i]);
	}
	document.body.appendChild(mainTable);
}

function buildTableRow(mainTable, fileName, meta) {
	for (var i = 0; i < meta.uvs.length; i++) {
		var rowElem = document.createElement("tr");
		var texDat = meta.uvs[i];
		var nameCellElem = document.createElement("td");
		nameCellElem.textContent = meta.name + ", " + i;
		var picCellElem = document.createElement("td");
		buildPicCell(picCellElem, texDat, fileName, 4);
		rowElem.appendChild(nameCellElem);
		rowElem.appendChild(picCellElem);
		mainTable.appendChild(rowElem);
	}
}

function buildPicCell(picCellElem, uv, fileName, scale) {
	var x1 = uv[0];
	var y1 = uv[1];
	var x2 = uv[2];
	var y2 = uv[3];
	var imgWidth = uv[4];
	var imgHeight = uv[5];
	var sx = Math.floor(imgWidth * x1 + 0.5);
	var sy = Math.floor(imgHeight * y1 + 0.5);
	var width = Math.floor(imgWidth * x2 + 0.5) - sx;
	var height = Math.floor(imgHeight * y2 + 0.5) - sy;
	picCellElem.style.backgroundImage = "url(" + fileName + ")";
	picCellElem.style.width = (scale * width) + "px";
	picCellElem.style.height = (scale * height) + "px";
	picCellElem.style.backgroundSize = (scale * imgWidth) + "px " + (scale * imgHeight) + "px";
	picCellElem.style.backgroundPosition = (scale * -1 * sx) + "px " + (scale * -1 * sy) + "px";
	picCellElem.className = "pixelated pic-cell";
}
window.onload = loadHandler;
