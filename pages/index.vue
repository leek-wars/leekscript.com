<template>
	<v-container>
		<h1>LeekScript language</h1>

		<div class='column6'>
			<div class='content'>
				<h2>Une syntaxe simple et souple</h2>
				Le langage LeekScript propose une syntaxe proche des langages les plus populaires comme C, Java, JavaScript pour une prise en main plus facile par les développeurs. Mais en même temps une syntaxe intuitive et sans éléments superflus pour un apprentissage plus agréable chez les débutants.
				<br>
				<lw-code code="let x = 12
[1, 2, 3].map(x -> x ^ 2)
'hello ' + 'world'
if x &lt; 12 then 'ok' else 'no' end "/>
			</div>
		</div>
		<br>
		<div class='column6'>
			<div class='content'>
				<h2>Fonctionnel</h2>
				Le LeekScript possède tout un aspect fonctionnel :
				<br>
				<lw-code code="[[14, 2], [213, 1], [54, 6]].map(x -> x[0] * x[1]) 
let g = a -> x -> a ^ x
let f = g(12)
f(2) // 144  "/>
			</div>
		</div>
		<br>
		<div class='column6'>
			<div class='content'>
				<h2>Opérateurs</h2>
				De nombreux opérateurs sont utilisables pour remplacer certaines méthodes en fonction de la classe de la valeur. Par exemple les codes suivants ont le même effet :
				<br>
				<lw-code code="String.size(String.split(String.reverse('hello world'), ''))
'hello world'.reverse().split('').size()
|~'hello world' / ' '|"/>
			</div>
		</div>
		<br>
		<div class='column6'>
			<div class='content'>
				<h2>Fonctions opérateurs</h2>
				Les opérateurs peuvent aussi s'utiliser comme des fonctions :
				<br>
				<lw-code code="+.class // Function
+(12, 5) // 17
let g = ope -> x, y -> ope(x, y); let add = g(+); add(12, 5) // 17  
let res = (if op == 'add' then + else * end)(12, 5)"/>
			</div>
		</div>
		<br>
		<div class='column6'>
			<div class='content'>
				<h2>Toutes les valeurs sont des objets</h2>
				Toutes les valeurs sont manipulables comme des objets, elles peuvent avoir des attributs et des méthodes. Mais pas de panique, le compilateur se charge d'optimiser le programme en utilisant des types primitifs au maximum.
				<br>
				<lw-code code="let x = -12; x.abs() // 12
'hello'.size() // 5
[].class.name // 'Array'
(x -> x).class // &lt;class Function&gt;"/>
			</div>
		</div>
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

<style scoped>
	h3 {
		margin: 10px 0;
	}
	code {
		margin-top: 6px;
		line-height: 24px;
	}
</style>

