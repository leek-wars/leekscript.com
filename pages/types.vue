<template>
	<v-container>
		<h1>Types</h1>

		Dans LeekScript, toutes les valeurs sont associées à une classe, il y a 8 classes de base :

		<ul>
			<li><b>Null</b> : possède une unique valeur qui peut servir à représenter une variable indéfinie ou une erreur. <br>
		Valeur possible : <lw-code code="null" />
		</li>
			<li><b>Boolean</b> : représente un booléen, avec 2 valeurs possibles : vrai ou faux. <br>
		Valeurs possibles : <lw-code code="true" />, <lw-code code="false" /></li>
			<li><b>Number</b> : représente un nombre. Les nombres possèdent des méthodes comme .abs(), .cos() etc. détaillées plus loin.<br>
		Valeurs possibles : <lw-code code="0" />, <lw-code code="12" />, <lw-code code="-5" />, <lw-code code="3.141" /></li>
			<li><b>String</b> : représente une chaîne de caractères, un texte. <br>
		Valeurs possibles : <lw-code code="''" />, <lw-code code="'hello'"/>, <lw-code code="'12345'"/>, <lw-code code="'i 4 _ 3a'"/></li>
			<li><b>Array</b> : un tableau (ou liste) contenant d'autres valeurs. <br>
		Valeurs possibles : <lw-code code="[]"/>, <lw-code code="[1, 2, 3]"/>, <lw-code code="[1, true, 'hello']"/>, <lw-code code="[[1, 2], 3]"/></li>
			<li><b>Map</b> : une map (ou tableau associatif) contenant des couples clé-valeur. <br>
		Valeurs possibles : <lw-code code="[:]"/>, <lw-code code="[1: 'a', 2: 'b', 3: 'c']"/>, <lw-code code="['aa': 1, 'bb': true, 'cc': 'hello']"/>, <lw-code code="[5.12: [1, 2], 1.57: 3]"/></li>
			<li><b>Object</b> : un object contient des valeurs, associées à une clé (chaîne de caractère). <br>
		Valeurs possibles : <lw-code code="{}"/>, <lw-code code="{a: 1, b: 2, c: 3}"/>, <lw-code code="{a: 1, b: true, c: 'hello'}"/>, <lw-code code="{a: {a: 12}}"/></li>
			<li><b>Function</b> : représente une fonction, qui prend en paramètre une ou plusieurs valeurs et en renvoie une seule. Il y a deux notations : celle avec le mot-clé 'function' et celle simplifiée avec une flèche.<br>
		Valeurs possibles : <lw-code code="function() {}"/>, <lw-code code="function(x, y) { return x + y }"/>, <lw-code code="-> null"/>, <lw-code code="x, y -> x + y"/></li>
			<li><b>Class</b> : Classe qui représente une classe. <br>
		Valeurs possibles : <lw-code code="Null"/>, <lw-code code="Boolean"/>, <lw-code code="Number"/>, <lw-code code="String"/>, <lw-code code="Array"/>, <lw-code code="Object"/>, <lw-code code="Function"/>, <lw-code code="Class"/>, <lw-code code="class Foo {}"/>, <lw-code code="class Bar { let x; let m = function() {} }"/></li>

		</ul>
		<br>
		L'utilisateur peut créer ses propres classes, et ainsi crééer plus de classes : <lw-code code="class Foo {}"/>. Les classes créées dérivent de la classe de base <b>Object</b> par défaut. Mais il est possible de préciser de quelle classe de base dérive sa nouvelle classe : <lw-code code="class Foo extends String {}"/>.
	</v-container>
</template>

<script>
import Code from '~/components/code.vue'

export default {
	components: {
		'lw-code': Code
	}
}
</script>

<style>
	h2 {
		margin: 10px 0;
	}
</style>