<template>
	<v-container>
		<h1>Types</h1>

		Dans LeekScript, toutes les valeurs sont associées à une classe, il y a 8 classes de base :

		<ul>
			<li><b>Null</b> : possède une unique valeur qui peut servir à représenter une variable indéfinie ou une erreur. <br>
		Valeur possible : <code>null</code></li>
			<li><b>Boolean</b> : représente un booléen, avec 2 valeurs possibles : vrai ou faux. <br>
		Valeurs possibles : <code>true</code>, <code>false</code></li>
			<li><b>Number</b> : représente un nombre. Les nombres possèdent des méthodes comme .abs(), .cos() etc. détaillées plus loin.<br>
		Valeurs possibles : <code>0</code>, <code>12</code>, <code>-5</code>, <code>3.141</code></li>
			<li><b>String</b> : représente une chaîne de caractères, un texte. <br>
		Valeurs possibles : <code>''</code>, <code>'hello'</code>, <code>'12345'</code>, <code>'i 4 _ 3a'</code></li>
			<li><b>Array</b> : un tableau (ou liste) contenant d'autres valeurs. <br>
		Valeurs possibles : <code>[]</code>, <code>[1, 2, 3]</code>, <code>[1, true, 'hello']</code>, <code>[[1, 2], 3]</code></li>
			<li><b>Map</b> : une map (ou tableau associatif) contenant des couples clé-valeur. <br>
		Valeurs possibles : <code>[:]</code>, <code>[1: 'a', 2: 'b', 3: 'c']</code>, <code>['aa': 1, 'bb': true, 'cc': 'hello']</code>, <code>[5.12: [1, 2], 1.57: 3]</code></li>
			<li><b>Object</b> : un object contient des valeurs, associées à une clé (chaîne de caractère). <br>
		Valeurs possibles : <code>{}</code>, <code>{a: 1, b: 2, c: 3}</code>, <code>{a: 1, b: true, c: 'hello'}</code>, <code>{a: {a: 12}}</code></li>
			<li><b>Function</b> : représente une fonction, qui prend en paramètre une ou plusieurs valeurs et en renvoie une seule. Il y a deux notations : celle avec le mot-clé 'function' et celle simplifiée avec une flèche.<br>
		Valeurs possibles : <code>function() {}</code>, <code>function(x, y) { return x + y }</code>, <code>-> null</code>, <code>x, y -> x + y</code></li>
			<li><b>Class</b> : Classe qui représente une classe. <br>
		Valeurs possibles : <code>Null</code>, <code>Boolean</code>, <code>Number</code>, <code>String</code>, <code>Array</code>, <code>Object</code>, <code>Function</code>, <code>Class</code>, <code>class Foo {}</code>, <code>class Bar { let x; let m = function() {} }</code></li>

		</ul>
		<br>
		L'utilisateur peut créer ses propres classes, et ainsi crééer plus de classes : <code>class Foo {}</code>. Les classes créées dérivent de la classe de base <b>Object</b> par défaut. Mais il est possible de préciser de quelle classe de base dérive sa nouvelle classe : <code>class Foo extends String {}</code>.
	</v-container>
</template>

<style>
	h2 {
		margin: 10px 0;
	}
</style>