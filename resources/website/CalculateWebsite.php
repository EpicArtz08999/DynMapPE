<html>
<head>
<style>
/* http://stackoverflow.com/questions/3900436/image-scaling-by-css-is-there-a-webkit-alternative-for-moz-crisp-edges */
.pixelated {
	image-rendering: optimizeSpeed; /* Legal fallback */
	image-rendering: -moz-crisp-edges; /* Firefox        */
	image-rendering: -o-crisp-edges; /* Opera          */
	image-rendering: -webkit-optimize-contrast; /* Safari         */
	image-rendering: optimize-contrast; /* CSS3 Proposed  */
	image-rendering: crisp-edges; /* CSS4 Proposed  */
	image-rendering: pixelated; /* CSS4 Proposed  */
	-ms-interpolation-mode: nearest-neighbor; /* IE8+           */
}

/*.pic-cell {
	padding: 0px;
	margin: 0px;
}*/
table {
	padding: 0px;
	margin: 0px;
	border: none;
}

table * {
	padding: 0px;
	margin: 0px;
	border: none;
}
</style>
</head>
<body>
<?php
$blocks = [0 => 'AIR',1 => 'STONE',2 => 'GRASS',3 => 'DIRT',4 => 'COBBLE',5 => 'WOODEN_PLANKS',6 => 'SAPLINGS',7 => 'BEDROCK',8 => 'WATER',9 => 'STILL_WATER',10 => 'LAVA',11 => 'STILL_LAVA',12 => 'SAND',13 => 'GRAVEL',14 => 'GOLD_ORE',15 => 'IRON_ORE',16 => 'COAL_ORE',17 => 'TRUNK',
		18 => 'LEAVE',19 => 'SPONGE',20 => 'GLASS',21 => 'LAPIS_ORE',22 => 'LAPIS_BLOCK',23 => 'DISPENSER',24 => 'SANDSTONE',25 => 'NOTEBLOCK',26 => 'BED_BLOCK',27 => 'POWERED_RAIL',28 => 'DETECTOR_RAIL',30 => 'COBWEB',31 => 'TALL_GRASS',32 => 'DEAD_BUSH',33 => 'PISTON',34 => 'PISTON_HEAD',
		35 => 'PISTON_EXTENSION',37 => 'DANDELION',38 => 'RED_FLOWER',39 => 'BROWN_MUSHROOM',40 => 'RED_MUSHROOM',41 => 'GOLD_BLOCK',42 => 'IRON_BLOCK',43 => 'DOUBLE_SLABS',44 => 'SLABS',45 => 'BRICKS_BLOCK',46 => 'TNT',47 => 'BOOKSHELF',48 => 'MOSSY_STONE',49 => 'OBSIDIAN',50 => 'TORCH',
		51 => 'FIRE',52 => 'MONSTER_SPAWNER',53 => 'OAK_WOODEN_STAIRS',54 => 'CHEST',55 => 'REDSTONE_WIRE',56 => 'DIAMOND_ORE',57 => 'DIAMOND_BLOCK',58 => 'WORKBENCH',59 => 'WHEAT_BLOCK',60 => 'FARMLAND',61 => 'FURNACE',62 => 'LIT_FURNACE',63 => 'SIGN_POST',64 => 'WOOD_DOOR_BLOCK',65 => 'LADDER',
		66 => 'RAIL',67 => 'COBBLESTONE_STAIRS',68 => 'WALL_SIGN',69 => 'LEVER',70 => 'STONE_PRESSURE_PLATE',71 => 'IRON_DOOR_BLOCK',72 => 'WOODEN_PRESSURE_PLATE',73 => 'REDSTONE_ORE',74 => 'LIT_REDSTONE_ORE',75 => 'UNLIT_REDSTONE_TORCH',76 => 'REDSTONE_TORCH',77 => 'STONE_BUTTON',78 => 'SNOW_LAYER',
		79 => 'ICE',80 => 'SNOW_BLOCK',81 => 'CACTUS',82 => 'CLAY_BLOCK',83 => 'JUKEBOX',85 => 'FENCE',86 => 'PUMPKIN',87 => 'NETHERRACK',88 => 'SOUL_SAND',89 => 'GLOWSTONE_BLOCK',90 => 'PORTAL',91 => 'JACK_O_LANTERN',92 => 'CAKE_BLOCK',93 => 'UNPOWERED_REPEATER',94 => 'POWERED_REPEATER',
		95 => 'STAINED_GLASS',96 => 'TRAPDOOR',97 => 'MONSTER_EGG',98 => 'STONE_BRICK',99 => 'BROWN_MUSHROOM_BLOCK',100 => 'RED_MUSHROOM_BLOCK',101 => 'IRON_BARS',102 => 'GLASS_PANEL',103 => 'MELON_BLOCK',104 => 'PUMPKIN_STEM',105 => 'MELON_STEM',106 => 'VINES',107 => 'FENCE_GATE',
		108 => 'BRICK_STAIRS',109 => 'STONE_BRICK_STAIRS',110 => 'MYCELIUM',111 => 'LILY_PAD',112 => 'NETHER_BRICK_BLOCK',113 => 'NETHER_BRICK_FENCE',114 => 'NETHER_BRICKS_STAIRS',115 => 'NETHER_WART_BLOCK',116 => 'ENCHANTMENT_TABLE',117 => 'BREWING_STAND_BLOCK',118 => 'CAULDRON',119 => 'END_PORTAL',
		120 => 'END_PORTAL_FRAME',121 => 'END_STONE',122 => 'DRAGON_EGG',123 => 'REDSTONE_LAMP',124 => 'LIT_REDSTONE_LAMP',126 => 'ACTIVATOR_RAIL',127 => 'COCOA_BEANS',128 => 'SANDSTONE_STAIRS',129 => 'EMERALD_ORE',130 => 'ENDERCHEST',131 => 'TRIPWIRE_HOOK',132 => 'TRIPWIRE',133 => 'EMERALD_BLOCK',
		134 => 'SPRUCE_WOODEN_STAIRS',135 => 'BIRCH_WOODEN_STAIRS',136 => 'BEACON',139 => 'COBBLESTONE_WALL',140 => 'FLOWER_POT_BLOCK',141 => 'CARROT_BLOCK',142 => 'POTATO_BLOCK',143 => 'WOODEN_BUTTON',144 => 'MOB_HEAD_BLOCK',145 => 'ANVIL_BLOCK',146 => 'TRAPPED_CHEST',
		147 => 'LIGHT_WEIGHTED_PRESSURE_PLATE',148 => 'HEAVY_WEIGHTED_PRESSURE_PLATE',149 => 'UNPOWERED_COMPARATOR',150 => 'POWERED_COMPARATOR',151 => 'DAYLIGHT_DETECTOR',152 => 'REDSTONE_BLOCK',153 => 'QUARTZ_ORE',154 => 'HOPPER',155 => 'QUARTZ_BLOCK',156 => 'QUARTZ_STAIRS',
		157 => 'DOUBLE_WOODEN_SLABS',158 => 'WOODEN_SLABS',159 => 'STAINED_HARDENED_CLAY',160 => 'STAINED_GLASS_PANE',161 => 'LEAVE2',162 => 'LOG2',163 => 'ACACIA_WOODEN_STAIRS',164 => 'DARK_OAK_WOODEN_STAIRS',165 => 'SLIMEBLOCK',166 => 'BARRIER',167 => 'IRON_TRAPDOOR',168 => 'PRISMARINE',
		169 => 'SEA_LANTERN',170 => 'HAY_BALE',171 => 'CARPET',172 => 'HARDENED_CLAY',173 => 'COAL_BLOCK',174 => 'PACKED_ICE',175 => 'DOUBLE_PLANT',176 => 'STANDING_BANNER',177 => 'WALL_BANNER',178 => 'DAYLIGHT_DETECTOR_INVERTED',179 => 'RED_SANDSTONE',180 => 'RED_SANDSTONE_STAIRS',
		181 => 'DOUBLE_STONE_SLAB2',182 => 'STONE_SLAB2',183 => 'FENCE_GATE_SPRUCE',184 => 'FENCE_GATE_BIRCH',185 => 'FENCE_GATE_JUNGLE',186 => 'FENCE_GATE_DARK_OAK',187 => 'FENCE_GATE_ACACIA',193 => 'SPRUCE_DOOR_BLOCK',194 => 'BIRCH_DOOR_BLOCK',195 => 'JUNGLE_DOOR_BLOCK',196 => 'ACACIA_DOOR_BLOCK',
		197 => 'DARK_OAK_DOOR_BLOCK',198 => 'GRASS_PATH',243 => 'PODZOL',244 => 'BEETROOT_BLOCK',245 => 'STONECUTTER',246 => 'GLOWING_OBSIDIAN',247 => 'NETHER_REACTOR',255 => 'RESERVED'];
$xchunks = array();
$ychunks = array();
$world = $_GET["world"];
$directory = "./data/";
$chunks = glob($directory . $world . "/*.dat");

$all="";
foreach($chunks as $chunk){
	$name = str_replace($directory . $world, "", str_replace(".dat", "", basename($chunk)));
	$xy = explode("_", $name);
	$xchunks[] = $xy[0];
	$ychunks[] = $xy[1];
}
sort($xchunks);
sort($ychunks);
$all.='<table>';
for($ychunk = $ychunks[0]; $ychunk < $ychunks[count($ychunks) - 1]; $ychunk++){
	$all.='<tr>';
	for($xchunk = $xchunks[0]; $xchunk < $xchunks[count($xchunks) - 1]; $xchunk++){
		$all.='<td>';
		$chunk = explode("|", file_get_contents($directory . $world . "/" . $xchunk . "_" . $ychunk . ".dat"));
		$all.="<table>";
		for($x = 0; $x < 16; $x++){
			$all.="<tr>";
			for($y = 0; $y < 16; $y++){
				// print("<td>");
				getImage(explode(":", $chunk[($x * 16) + $y])[0], explode(":", $chunk[($x * 16) + $y])[1]);
				// print($chunk[($x * 16) + $y]);
				$all.="</td>";
			}
			$all.="</tr>";
		}
		$all.="</table>";
		$all.="</td>";
	}
	$all.="</tr>";
}
$all.="</table>";
print($all);
// print_r(json_decode(file_get_contents('terrain.meta'), true)[0]["uvs"][0]);
// print_r(json_decode(file_get_contents('terrain.meta'), true));
function getImage($id, $metas){
	global $blocks;
	$terrainMeta = json_decode(file_get_contents('terrain.meta'), true);
	$index = strtolower($blocks[$id]);
	$search = search($terrainMeta, "name", $index);
	if(!empty($search)) $fullblock = $search[0];
	elseif(!empty($terrainMeta[$id])) $fullblock = $terrainMeta[$id];
	else $fullblock = $terrainMeta[0];
	$uv = $fullblock["uvs"][$metas];
	$scale = 1;
	$x1 = $uv[0];
	$y1 = $uv[1];
	$x2 = $uv[2];
	$y2 = $uv[3];
	$imgWidth = $uv[4];
	$imgHeight = $uv[5];
	$sx = floor($imgWidth * $x1 + 0.5);
	$sy = floor($imgHeight * $y1 + 0.5);
	$width = floor($imgWidth * $x2 + 0.5) - $sx;
	$height = floor($imgHeight * $y2 + 0.5) - $sy;
	$image = '<td class="pixelated pic-cell" style="background-image:url(\'terrain-atlas.png\');width:' . ($scale * $width) . 'px;height:' . ($scale * $height) . 'px;background-size:' . ($scale * $imgWidth) . 'px ' . ($scale * $imgHeight) . 'px;background-position:' . ($scale * -1 * $sx) . 'px ' . ($scale * -1 * $sy) . 'px;">';
	print $image;
}

function search($array, $key, $value){
	$results = array();
	search_r($array, $key, $value, $results);
	return $results;
}

function search_r($array, $key, $value, &$results){
	if(!is_array($array)){
		return;
	}
	
	if(isset($array[$key]) && $array[$key] == $value){
		$results[] = $array;
	}
	
	foreach($array as $subarray){
		search_r($subarray, $key, $value, $results);
	}
}
?>
</body>
</html>