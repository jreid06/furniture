<?php
	include dirname(__DIR__).'/furniture/templates/header.php';
?>

<div id="app1">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>{{age}}</p>
				<p v-model="totalResults">Total Results from AJAX: {{totalResults}}</p>
				<button class="btn btn-info" @click="getSportsRequest">Get Sports Data Title</button>
			</div>

			<div class="col-12 d-flex flex-row flex-wrap">
				<div class="p-2">
					<div class="box" @click="attachCol = !attachCol" :class="{green: attachCol}">

					</div>
				</div>
				<div class="p-2">
					<div class="box">

					</div>
				</div>
			</div>

			<div class="col-12">
				<button class="btn btn-info" v-on:click="add()">Add to Age</button>

				<button class="btn btn-info" v-on:click="counter++">Click Counter 1</button>
				<button class="btn btn-info" v-on:click="countertwo++">Click Counter 2</button>
			</div>

			<div class="col-12">
				<p><strong>counter 1:</strong> {{counter}} {{output}}</p>
				<p><strong>counter 2:</strong> {{countertwo}} </p>
			</div>

			<div class="col-12">
				<p><strong>Item:</strong> Football Manager 2018 Mac</p>
				<p><strong>Price: </strong>£{{price}}</p>
				<p><strong>Quantity: </strong> {{quantity}}</p>
				<p><strong>Total: £</strong> <span v-model="total">{{total}}</span> </p>
			</div>
		</div>

		<div class="col-12">
			<button style="text-align: center;" class="btn btn-info" v-on:click="quant('add')">Add Quantity</button>
			<button style="text-align: center;" class="btn btn-info" v-on:click="quant('minus')">Minus Quantity</button>
			<button style="text-align: center;" class="btn btn-primary" v-on:click="pay()">Pay</button>
		</div>

		<hr>

		<!-- v-if alternative -->
		<div class="col-12">
			<template v-if="paid">
				<h4>SUCCESS WITH YOUR PURCHASE FOR Football Manager 2018 Mac: £ <span>{{finalPrice}}</span> </h4>
			</template>
		</div>

		<!-- v -->
		<div class="col-12">
			<template v-if="!paid">
				<h4>Payment not successfull yet. select quantity</h4>
			</template>

		</div>
		<hr>
		<div class="col-12">
			<h3>Lists</h3>
			<ul class="customList">
				<li v-for="article in sportsData">{{article.title}}</li>
			</ul>
			<pre>
				<!-- {{sportsData}} -->
			</pre>

		</div>

		<div class="col-12">
			<div class="row">
				<card
					v-for="(article, index) in sportsData"
					v-bind:key="article.publishedAt"
					v-bind:title="article.title"
					v-bind:author="article.author"
					v-bind:description="article.description"
					v-bind:image="article.urlToImage">
				</card>
			</div>
		</div>

	</div>

</div>

<div id="app2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p id="testpara"></p>
				<button v-on:click="showMessage" class="btn btn-primary">Update</button>
			</div>

			<div class="col-12">
				<p>{{message2}}</p>
				<input type="text" name="" v-model="message2" v-on:keyup.enter="showMessage">
				<hr>
				<p>{{object}}</p>
			</div>

		</div>
	</div>
</div>
<?php
	include dirname(__DIR__).'/furniture/templates/footer.php';
 ?>
