<template>
	<v-container>
		<h1>LeekScript language</h1>

		<div class='column6'>
			<div class='console shadow small'>
				<div class='bar'></div>
				<div class='content'>
					<div class='line'>let x = 12</div>
					<div class='line'>[1, 2, 3].map(x -> x ^ 2)</div>
					<div class='line'>'hello ' + 'world'</div>
					<div class='line'>if x &lt; 12 then 'ok' else 'no' end</div>
				</div>
			</div>
		</div><div class='column6'>
			<div class='content'>
				<h2>Une syntaxe simple et souple</h2>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a porttitor est. Mauris cursus turpis diam, ut bibendum massa lobortis imperdiet. Integer id pharetra lorem. Fusce id vulputate mauris, nec tincidunt est.
			</div>
		</div>
		<br><br>

		<div class='column6'>
			<div class='content'>
				<h2>Fonctionnel</h2>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a porttitor est. Mauris cursus turpis diam, ut bibendum massa lobortis imperdiet. Integer id pharetra lorem. Fusce id vulputate mauris, nec tincidunt est.
			</div>
		</div><div class='column6'>
			<div class='console shadow small'>
				<div class='bar'></div>
				<div class='content'>
					<div class='line'>[[14, 2], [213, 1], [54, 6]].map(x -> x[0] * x[1])</div>
					<div class='line'>let g = a -> x -> a ^ x;  let f = g(12);  f(2) // 144</div>
				</div>
			</div>
		</div>
		<br><br>

		<div class='column6'>
			<div class='console shadow small'>
				<div class='bar'></div>
				<div class='content'>
					<div class='line'>String.size(String.split(String.reverse('hello world'), ''))</div>
					<div class='line'>'hello world'.reverse().split('').size()</div>
					<div class='line'>|~'hello world' / ' '|</div>
				</div>
			</div>
		</div><div class='column6'>
			<div class='content'>
				<h2>Opérateurs</h2>
				De nombreux opérateurs sont utilisables pour remplacer certaines méthodes en fonction de la classe de la valeur. Par exemple les codes suivants ont le même effet
			</div>
		</div>
		<br><br>

		<div class='column6'>
			<div class='content'>
				<h2>Fonctions opérateurs</h2>
				Les opérateurs peuvent aussi s'utiliser comme des fonctions
			</div>
		</div><div class='column6'>
			<div class='console shadow small'>
				<div class='bar'></div>
				<div class='content'>
					<div class='line'>+.class // Function</div>
					<div class='line'>+(12, 5) // 17</div>
					<div class='line'>let g = ope -> x, y -> ope(x, y); let add = g(+); add(12, 5) // 17</div>
					<div class='line'>let res = (if op == 'add' then + else * end)(12, 5)</div>
				</div>
			</div>
		</div>
		<br><br>

		<div class='column6'>
			<div class='console shadow small'>
				<div class='bar'></div>
				<div class='content'>
					<div class='line'>let x = -12; x.abs() // 12</div>
					<div class='line'>'hello'.size() // 5</div>
					<div class='line'>[].class.name // 'Array'</div>
					<div class='line'>(x -> x).class // &lt;class Function&gt;</div>
				</div>
			</div>
		</div><div class='column6'>
			<div class='content'>
				<h2>Toutes les valeurs sont des objets</h2>
				Toutes les valeurs sont manipulables comme des objets, elles peuvent avoir des attributs et des méthodes. Mais pas de panique, le compilateur se charge d'optimiser le programme en utilisant des types primitifs au maximum.
			</div>
		</div>
	</v-container>
</template>

<style>
	h3 {
		margin: 10px 0;
	}
</style>

