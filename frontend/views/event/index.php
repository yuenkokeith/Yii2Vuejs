<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="site-index">

    <div class="body-content">

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
				  <i class="fa fa-bars"></i>
				  <span class="sr-only">Toggle Menu</span>
				</button>
				</div>

				<div class="p-4 pt-5">
					<h1><a href="index.html" class="logo">Splash</a></h1>
					<ul class="list-unstyled components mb-5">
						<li class="active">
							<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
							<ul class="collapse list-unstyled" id="homeSubmenu">
								<li>
									<a href="#">Home 1</a>
								</li>
								<li>
									<a href="#">Home 2</a>
								</li>
								<li>
									<a href="#">Home 3</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
							<ul class="collapse list-unstyled" id="pageSubmenu">
								<li>
									<a href="#">Page 1</a>
								</li>
								<li>
									<a href="#">Page 2</a>
								</li>
								<li>
									<a href="#">Page 3</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Portfolio</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>

					<div class="mb-5">
						<h3 class="h6">Subscribe for newsletter</h3>
						<form action="#" class="colorlib-subscribe-form">
							<div class="form-group d-flex">
								<div class="icon"><span class="icon-paper-plane"></span></div>
								<input type="text" class="form-control" placeholder="Enter Email Address">
							</div>
						</form>
					</div>

					<!--
					<div class="footer">
						<p>
                        
							Copyright &copy;
							<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                     
						</p>
					</div>
					-->

				</div>
			</nav>

			<!-- Page Content  -->
			<div id="content" class="p-4 p-md-5 pt-5">

				<!-- vuejs components -->
				<div id="userListDynmaicInput">
				  <div>
						<b-button
							 aria-controls="collapse-4"
							 @click="userList"
						>
						 Select Product List
						</b-button>
				
						<!-- Dynamic Input -->
						  <div v-for="input in inputs" :key="input.id">
							<b-container>
							  <b-row cols="8" cols-sm="8" cols-md="8" cols-lg="8">
								<b-col>
									<label>Name</label>
									<input placeholder="Enter your name" v-model="input.name" key="name-input">
								</b-col>
								<b-col>
									<label>Model</label>
									<input placeholder="Enter your model" v-model="input.model" key="model-input">
								</b-col>
								<b-col>
									<label>qty</label>
									<input placeholder="Enter your qty" v-model="input.qty" key="qty-input">
								</b-col>
								<b-col>
									<label>list price</label>
									<input placeholder="Enter your list price" v-model="input.lprice" key="lprice-input">
								</b-col>
								<b-col>
									<label>unit price</label>
									<input placeholder="Enter your unit price" v-model="input.uprice" key="uprice-input">
								</b-col>
								<b-col>
									<label>Amount</label>
									<input v-model="sumAmount(input)" key="amount-input">
								</b-col>
								<b-col>
									<label>Action</label>
									<br/>
									<b-button aria-controls="collapse-4" @click="removeUser(input)">Remove</b-button>
								</b-col>
							  </b-row>
							</b-container>

						  </div>
						 {{ inputs }}
		 
						<!-- Product list modal -->
						<b-modal class="modal zoomIn" size="600" ref="userlist-modal">
							<b-table
								class="disableHightLight"
								selectable 
								select-mode="single" 
								striped hover 
								:items="userlist"
								@row-selected="onRowSelected"
								@row-dblclicked="rowDbClicked"
							>
							</b-table>
							{{ selectedUser }}

							<template v-slot:modal-footer class="zoomInDown">
								<div class="w-100">
									<p class="float-left">Modal Footer</p>
									<b-button
									variant="primary"
									size="sm"
									class="float-right"
									@click="closeModal"
									>
									Close
									</b-button>
									<b-button
									variant="primary"
									size="sm"
									class="float-right"
									@click="addUser"
									>
									Ok
									</b-button>
								</div>
							</template>
						</b-modal>
				  </div>
				</div>




				<br/><br/><br/><br/>

				<div id="dynmaicInput">
				  <div>
						<b-button
						  aria-controls="collapse-4"
						  @click="addInput"
						>
						 add input
						</b-button>
				
						  <div v-for="input in inputs" :key="input.id">
							<label>Username</label>
								<input placeholder="Enter your username" v-model="input.username" key="username-input">
							<label>password</label>
								<input placeholder="Enter your password" v-model="input.password" key="password-input">
							<label>qty</label>
								<input placeholder="Enter your qty" v-model="input.qty" key="qty-input">
							<label>list price</label>
								<input placeholder="Enter your list price" v-model="input.lprice" key="lprice-input">
							<label>unit price</label>
								<input placeholder="Enter your unit price" v-model="input.uprice" key="uprice-input">
							<label>Amount</label>
								<input v-model="sumAmount(input)" key="amount-input">
						
						  </div>
						 {{ inputs }}
				  </div>

				</div>






				<br/><br/><br/><br/><br/><br/>
		
				<div id="app">
					<div>
						<!-- :fields="fields" -->
						<!--  striped hover -->
						<!--  show-empty -->
						<b-table striped 
								show-empty
								:fields="fields"
								:items="filtered">
					
							<template slot="top-row" slot-scfieldope="{ fields }" v-for="field in fields">
								<td v-if="field.label!='Age' && field.label!='Full Name' && field.label!='Group' && field.label!='Actions' 
											&& field.label!='Gender'  && field.label!='Last Name'
											&& field.label!='Is Active' && field.label!='First Name'
											" 
									:key="field.key">
								  <input class="form-control form-control-md" v-model="filtersFields[field.key]" :placeholder="field.label">
								</td>


								<!-- alternative filter box -->
								<td v-else-if="field.label==='Age'" :key="field.key">
									<!--
									<b-form-select 
										v-model="filtersFields[field.key]" 
										style="width:150px"
										:options="firstnamefiltered" 
										class="form-control form-control-lg"
									>
									</b-form-select>
									-->
									<v-select 
										v-model="filtersFields[field.key]" 
										:options="agefiltered" 
										placeholder="...Find Age"
									 />
								</td>

								<!-- alternative filter box -->
								<td v-else-if="field.label==='Full Name'" :key="field.key">
								</td>

								<!-- alternative filter box -->
								<td v-else-if="field.label==='First Name'" :key="field.key">
									<!--
									<b-form-select 
										v-model="filtersFields[field.key]" 
										style="width:150px"
										:options="firstnamefiltered" 
										class="form-control form-control-lg"
									>
									</b-form-select>
									-->
									<v-select 
										v-model="filtersFields[field.key]" 
										:options="firstnamefiltered" 
										placeholder="...Find First Name "
									 />
								</td>

								<!-- alternative filter box -->
								<td v-else-if="field.label==='Last Name'" :key="field.key">
									<v-select 
										v-model="filtersFields[field.key]" 
										:options="lastnamefiltered" 
										placeholder="...Find Last Name "
									 />
								</td>
						
								<!-- alternative filter box -->
								<td v-else-if="field.label==='Group'" :key="field.key">
									<!--
									<b-form-select 
										v-model="filtersFields[field.key]" 
										:options="options" 
										style="width:150px"
										class="form-control form-control-lg"
									/>
									-->

									<v-select 
										v-model="filtersFields[field.key]" 
										:options="groupfiltered" 
										placeholder="...Find Group "
									 />
								</td>

								<!-- alternative filter box -->
								<td v-else-if="field.label==='Gender'" :key="field.key">
									<!--
									<b-form-select 
										v-model="filtersFields[field.key]" 
										:options="genderOptions" 
										style="width:150px"
										class="form-control form-control-lg"
									/>
									-->
									<v-select 
										v-model="filtersFields[field.key]" 
										:options="genderfiltered" 
										placeholder="...Find Gender "
									 />
								</td>

								<!-- alternative filter box -->
								<td v-else-if="field.label==='Is Active'" :key="field.key">
									<b-form-checkbox
										v-model="filtersFields[field.key]"
										value="1"
										unchecked-value="0"
									/>
								</td>

								<!-- skip filter box -->
								<td v-else-if="field.label==='Actions'" :key="field.key">
									<!--
									<date-picker v-model="date" :config="{format: 'DD-MM-YYYY'}"></date-picker>
									-->
								</td>

							</template>
					

							<template v-slot:cell(name)="data">
								<b class="text-info">{{ data.value.last }}</b>, <b>{{ data.value.first }}</b>
							</template>

							<!--
							<template v-slot:cell(age)="data">
								<b-form-input
									type="text"
									v-model="data.item.age"
									style="width:150px"
								/>
							</template>

							<template v-slot:cell(first_name)="data">
								<b-form-input
									type="text"
									v-model="data.item.first_name"
									style="width:150px"
								/>
							</template>

							<template v-slot:cell(last_name)="data">
								<b-form-input
									type="text"
									v-model="data.item.last_name"
									style="width:150px"
								/>
							</template>
							-->



							<template v-slot:cell(group)="data">
								<b-form-select 
									v-model="data.item.group" 
									:options="options" 
									style="width:150px"
								/>
							</template>

							<template v-slot:cell(gender)="data">
								<b-form-select 
									v-model="data.item.gender" 
									:options="genderOptions" 
									style="width:150px"
								/>
							</template>
					
							<template v-slot:cell(is_active)="data">
								<b-form-checkbox
									v-model="data.item.is_active"
									value="1"
									unchecked-value="0"
								/>
							</template>	
					
							<template v-slot:cell(actions)="row">
								<b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
									Edit modal
								</b-button>
								<b-button size="sm" @click="iframeinfo(row.item, row.index, $event.target)" class="mr-1">
									Show modal(iframe)
								</b-button>
								<b-button size="sm" @click="row.toggleDetails">
									{{ row.detailsShowing ? 'Hide' : 'Show' }} Details
								</b-button>
							</template>

							<template v-slot:row-details="row">
								<b-card class="fadeIn">
									<ul>
									<li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
									</ul>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Age:</b></b-col>
									<b-form-input
										type="text"
										v-model="row.item.age"
										style="width:150px"
										/>
									</b-row>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>First Name:</b></b-col>
									<b-form-input
										type="text"
										v-model="row.item.first_name"
										style="width:150px"
										/>
									</b-row>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Last Name:</b></b-col>
									<b-form-input
										type="text"
										v-model="row.item.last_name"
										style="width:150px"
										/>
									</b-row>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Last Name:</b></b-col>
									<b-form-input
										type="text"
										v-model="row.item.last_name"
										style="width:150px"
										/>
									</b-row>
						  
									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Group:</b></b-col>
									<b-form-select 
										v-model="row.item.group" 
										:options="options" 
										style="width:150px"
									/>
									</b-row>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Gender:</b></b-col>
									<b-form-select 
										v-model="row.item.gender" 
										:options="genderOptions" 
										style="width:150px"
									/>
									</b-row>

									<b-row class="mb-2">
									<b-col sm="3" class="text-sm-right"><b>Is Active:</b></b-col>
									<b-form-checkbox
										id="checkbox-1"
										v-model="row.item.is_active"
										name="checkbox-1"
										value="1"
										unchecked-value="0"
									/>
									</b-row>

								</b-card>
							</template>
					
						</b-table>
						{{ items }}
					</div>
			

					 <!-- Info modal -->
						<b-modal ref="my-modal" :id="infoModal.id" :title="infoModal.title" class="fadeIn">
							<pre>{{ infoModal.content }}</pre>
				
							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>Age:</b></b-col>
								<b-form-input
									type="text"
									v-model="infoModal.content.age"
									style="width:150px"
									/>
							</b-row>

							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>First Name:</b></b-col>
								<b-form-input
									type="text"
									v-model="infoModal.content.first_name"
									style="width:150px"
									/>
							</b-row>

							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>Last Name:</b></b-col>
								<b-form-input
									type="text"
									v-model="infoModal.content.last_name"
									style="width:150px"
									/>
							</b-row>

							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>Group:</b></b-col>
								<b-form-select 
									v-model="infoModal.content.group" 
									:options="options" 
									style="width:150px"
								/>
							</b-row>

							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>Gender:</b></b-col>
								<b-form-select 
									v-model="infoModal.content.gender" 
									:options="genderOptions" 
									style="width:150px"
								/>
							</b-row>

							<b-row class="mb-2">
								<b-col sm="3" class="text-sm-right"><b>Is Active:</b></b-col>
								<b-form-checkbox
									  id="checkbox-1"
									  v-model="infoModal.content.is_active"
									  name="checkbox-1"
									  value="1"
									  unchecked-value="0"
								/>
							</b-row>
					
							<template v-slot:modal-footer>
							<div class="w-100">
							  <p class="float-left">Modal Footer Content</p>
							  <b-button
								variant="primary"
								size="sm"
								class="float-right"
								@click="closeModal"
							  >
								Close
							  </b-button>
							  <b-button
								variant="primary"
								size="sm"
								class="float-right"
								@click="okInfoModal"
							  >
								Ok
							  </b-button>
							</div>
						  </template>
						</b-modal>
			 

						<!-- Iframe Info modal -->
						<b-modal class="modal zoomIn" size="1200" ref="my-iframemodal" :id="iframeinfoModal.id" :title="iframeinfoModal.title">
							<div id="detailContent" style="height:100%" class="zoomInDown"></div>

							<template v-slot:modal-footer class="zoomInDown">
								<div class="w-100">
									<p class="float-left">Modal Footer</p>
									<b-button
									variant="primary"
									size="sm"
									class="float-right"
									@click="closeIframeModal"
									>
									Close
									</b-button>
									<b-button
									variant="primary"
									size="sm"
									class="float-right"
									@click="okIframeInfoModal"
									>
									Ok
									</b-button>
								</div>
							</template>
						</b-modal>
				</div>
				<!-- vuejs components -->

			</div>
		</div>



    </div>
</div>

<script>

	new Vue({
		el: '#userListDynmaicInput',
		data() {
			return {
				id: 0,
				inputs: [],
				userlist: [
					{ name: 'XNX', model:'XNX-100', qty: '1', lprice: '8000', uprice:'7000' }, 
					{ name: 'GYN', model:'GYN100', qty: '1', lprice: '12000', uprice:'11500'}, 
					{ name: 'PY', model:'PY3000', qty: '1', lprice: '15000', uprice:'13500'},
					{ name: 'LG', model:'LG1205', qty: '1', lprice: '7500', uprice:'7000'},
					{ name: 'NA', model:'NA1200', qty: '1', lprice: '6000', uprice:'5800'},
					{ name: 'KT', model:'KT6022', qty: '1', lprice: '17000', uprice:'15500'},
					{ name: 'HY', model:'HY0001', qty: '1', lprice: '25000', uprice:'21500'}
				],
				selectedUser: []
			}
		},
		methods: {
			onRowSelected(items) {
				this.selectedUser = items
				//console.log(this.selectedUser)
				//console.log(this.selectedUser[0]['model'])
			},
			rowDbClicked() {
				this.addUser()
			},
			userList() {
				this.showModal()
			},
			addInput () {
			
				let isDuplicated = this.inputs.filter(c => {
					return c.model.indexOf(this.selectedUser[0].model) > -1
					}
				)
	  
				if(isDuplicated==0) {
					this.inputs.push({
						id: this.id,
						name: this.selectedUser[0].name,
						model: this.selectedUser[0].model,
						qty: this.selectedUser[0].qty,
						lprice: this.selectedUser[0].lprice,
						uprice: this.selectedUser[0].uprice
					});
					// increment the id for the next input that will be created.
					this.id++;
				} else {
					this.msgbox('cannot add duplicated product!')
				}
				
			},
			msgbox(msg) {
				this.$bvModal.msgBoxOk(msg, {
					  title: 'System Message',
					  size: 'sm',
					  buttonSize: 'sm',
					  okVariant: 'success',
					  headerClass: 'p-2 border-bottom-0',
					  footerClass: 'p-2 border-top-0',
					  centered: true
					})
					  .then(value => {
						//this.boxTwo = value
					  })
					  .catch(err => {
						// An error occurred
					  })
			},
			msgboxYesNo(msg, actionType='', obj=null) {
				this.$bvModal.msgBoxConfirm(msg, {
					  title: 'System Message',
					  size: 'sm',
					  buttonSize: 'sm',
					  okVariant: 'danger',
					  okTitle: 'YES',
					  cancelTitle: 'NO',
					  headerClass: 'p-2 border-bottom-0',
					  footerClass: 'p-2 border-top-0',
					  centered: true
					})
					  .then(value => {
						// confirmed
						if(value) {
							switch(actionType) {
								case 'remove':
									for( var i = 0; i < this.inputs.length; i++){ 
										if ( this.inputs[i].id === obj.id) {
											// match current input id and remove this input
											this.inputs.splice(i, 1)
										}
									}
								break;
								case 'insert':
								// code block
								break;
								default:
								// code block
							}
						}
					  })
					  .catch(err => {
						// An error occurred
					  })
			},
			sumAmount(input) {
				if(!isNaN(input.qty) && !isNaN(input.uprice)) {
					input.amount = input.qty * input.uprice
				} else {
					input.amount = ''
				}
				
				return input.amount
			},
			addUser() {
				if(this.selectedUser.length>0) {
					this.addInput()
					this.selectedUser = []
					this.closeModal()
				}
			},
			removeUser(input) {
				this.msgboxYesNo('are you sure to remove this product!', 'remove', input)
			},
			showModal() {
				this.$refs['userlist-modal'].show()
			},
			closeModal() {
				this.$refs['userlist-modal'].hide()
			}
		}
	})
	

	new Vue({
		el: '#dynmaicInput',
		data() {
			return {
				id: 0,
				inputs: []
			}
		},
		methods: {
			addInput () {
				this.inputs.push({
					id: this.id,
					username: this.username,
					password: this.password,
					qty: this.qty,
					lprice: this.lprice,
					uprice: this.uprice
				});
				// increment the id for the next input that will be created.
				this.id++;
			},
			sumAmount(input) {
				if(!isNaN(input.qty) && !isNaN(input.uprice)) {
					input.amount = input.qty * input.uprice
				} else {
					input.amount = ''
				}
				
				return input.amount
			}
		}
	})


    var app = new Vue({
        el: '#app',
        data() {
					return {
								inputs: [],
								lastnameOptions: [
									{ value: '', text: '... Select Last Name' },
									{ value: 'Cat', text: 'Cat' },
									{ value: 'Dog', text: 'Dog ' },
									{ value: 'Fish', text: 'Fish ' },
									{ value: 'Lion', text: 'Lion ' }
								],
								firstnameOptions: [
									{ value: '', text: '... Select First Name' },
									{ value: 'Terrain', text: 'Terrain' },
									{ value: 'Ocean', text: 'Ocean' },
									{ value: 'Landscape', text: 'Landscape' },
									{ value: 'Mountain', text: 'Mountain' }
								],
								selected: null,
								options: [
									{ value: '', text: '... Select Group' },
									{ value: 'VIP', text: 'VIP' },
									{ value: 'Normal', text: 'Normal ' },
									{ value: 'Junior', text: 'Junior ' },
									{ value: 'Senior', text: 'Senior ' }
									//{ value: { C: '3PO' }, text: 'This is an option with object value' },
									//{ value: 'd', text: 'This one is disabled', disabled: true }
								],
								genderOptions: [
									{ value: '', text: '... Select Gender' },
									{ value: 'Male', text: 'Male' },
									{ value: 'Female', text: 'Female ' }
								],
								fields: [
									{
										key: 'age',
										label: 'Age',
										sortable: true,
									},
									{ 
										key: 'name', label: 'Full Name' 
									},
									{
										key: 'first_name',
										label: 'First Name',
										sortable: true,
									},
									{
										key: 'last_name',
										label: 'Last Name',
										sortable: true,
									},
									{
										key: 'group',
										label: 'Group',
										sortable: true,
									},
									{
										key: 'gender',
										label: 'Gender',
										sortable: true,
									},
									{
										key: 'is_active',
										label: 'Is Active',
										sortable: true,
									},
									{ 
										key: 'actions', 
										label: 'Actions' 
									},
								],
								filtersFields: {
										  age: '',
										  first_name: '',
										  last_name: '',
										  group: '',
										  gender: '',
										  is_active: '',
										  actions: ''
								},
								items: [
									{ age: 40, name: { first: 'Dickerson', last: 'Macdonald' }, first_name: 'Dickerson', last_name: 'Macdonald', group: '', gender: 'Male', is_active: '1', actions: '' },
									{ age: 21, name: { first: 'Larsen', last: 'Shaw' }, first_name: 'Larsen', last_name: 'Shaw', group: 'Normal', gender: 'Female', is_active: '1', actions: '' },
									{ age: 89, name: { first: 'Geneva', last: 'Wilson' }, first_name: 'Geneva', last_name: 'Wilson', group: 'Normal', gender: '', is_active: '1', actions: '' },
									{ age: 38, name: { first: 'Jami', last: 'Carney' }, first_name: 'Jami', last_name: 'Carney', group: 'VIP', gender: '', is_active: '1', actions: ''}
								],
								infoModal: {
									id: 'info-modal',
									title: '',
									content: ''
								},
								iframeinfoModal: {
									id: 'iframeinfo-modal',
									title: '',
									content: ''
								},
								date: '',
			}
		},
		computed: {
		  filtered () {
		
			  const filtered = this.items.filter(item => {
					// Multi fields filter
					if(this.filtersFields['age']!='' || this.filtersFields['first_name']!='' || this.filtersFields['last_name']!=''
							|| this.filtersFields['group']!='' || this.filtersFields['gender']!='' || this.filtersFields['is_active']!='') 
					{
						var obj;
						var indexArr = ["age", "first_name", "last_name", "group", "gender", "is_active"];
						var counter=0;
						for(var i=0; i<indexArr.length; i++) {

							//if(this.filtersFields[indexArr[i]].includes('...')) {
								//this.filtersFields[indexArr[i]] = ''
							//}


							//this.filtersFields[indexArr[i]] = ""
							
							if(this.filtersFields[indexArr[i]]!="" && this.filtersFields[indexArr[i]]!=null) {
								if(counter==0) {
									obj = Object.keys(this.filtersFields).every(key => String(item[indexArr[i]]).includes(this.filtersFields[indexArr[i]]))
								} else {
									obj += Object.keys(this.filtersFields).every(key => String(item[indexArr[i]]).includes(this.filtersFields[indexArr[i]]))
								}
								counter++
								console.log("##########" + this.filtersFields[indexArr[i]]);
							}  else if(this.filtersFields[indexArr[i]]==null) {
								if(counter==0) {
									obj = Object.keys(this.filtersFields).every(key => String(item[indexArr[i]]).includes(""))
								} else {
									obj += Object.keys(this.filtersFields).every(key => String(item[indexArr[i]]).includes(""))
								}
								this.filtersFields[indexArr[i]]=''
								counter++
							}
						}

						return obj

					} else if(this.filtersFields['age']=='' && this.filtersFields['first_name']=='' &&
							this.filtersFields['last_name']=='' && this.filtersFields['group']=='' &&
							this.filtersFields['gender']=='' && this.filtersFields['is_active']=='') 
					{

						var obj = Object.keys(this.filtersFields).every(key => String(item[key]).includes(this.filtersFields[key]))
						return obj

					} else if(this.filtersFields['age']==null && this.filtersFields['first_name']==null &&
							this.filtersFields['last_name']==null && this.filtersFields['group']==null &&
							this.filtersFields['gender']==null && this.filtersFields['is_active']==null) 
					{

						var obj = Object.keys(this.filtersFields).every(key => String(item[key]).includes(this.filtersFields[key]))
						return obj

					} else {
						return Object.keys(this.filtersFields).every(key => String(item[key]).includes(this.filtersFields[key]))
					}
			  })

			  return filtered.length > 0 ? filtered : [
                    {
                        age: '',
						first_name: '',
						last_name: '',
						group: '',
						gender: '',
						is_active: '',
						actions: ''
					}
                ]
		  },
		  firstnamefiltered () {
			  const filtered = this.items.filter(item => {
					//return Object.keys(this.filtersFields).every(key => String(item['first_name']).includes(this.filtersFields['first_name']))
					return Object.keys(this.filtersFields).every(key => String(item['first_name']))
			  })

			  // create list for select box filter
			  var firstname= []; 
			  //firstname.push({ value: '', text: '... Select First Name' });
			  firstname.push('');
			  jQuery.each(filtered, function() {
					//var josn = { value: this.first_name, text: this.first_name }
					firstname.push(this.first_name)
					//firstname.indexOf(this.firstname) >= 0 ? false : firstname.push(this.firstname)
			  })

			  //console.log(JSON.stringify(filtered))
			  return firstname
		  },
		  lastnamefiltered () {
			  const filtered = this.items.filter(item => {
					//return Object.keys(this.filtersFields).every(key => String(item['last_name']).includes(this.filtersFields['last_name']))
					return Object.keys(this.filtersFields).every(key => String(item['last_name']))
			  })

			  // create list for select box filter
			  var lastname= []; 
			  lastname.push('');
			  jQuery.each(filtered, function() {
					//var josn = { value: this.last_name, text: this.last_name }
					lastname.push(this.last_name);
			  })

			  return lastname
		  },
		  groupfiltered () {
			  const filtered = this.items.filter(item => {
					return Object.keys(this.filtersFields).every(key => String(item['group']))
			  })

			  // create list for select box filter
			  var group= []; 
			  group.push('');
			  jQuery.each(filtered, function() {
					//var josn = { value: this.last_name, text: this.last_name }
					group.indexOf(this.group) >= 0 ? false : group.push(this.group)

					//group.push(this.group);
			  })

			  return group
		  },
		  genderfiltered () {
			  const filtered = this.items.filter(item => {
					return Object.keys(this.filtersFields).every(key => String(item['gender']))
			  })

			  // create list for select box filter
			  var gender= []; 
			  gender.push('');
			  jQuery.each(filtered, function() {
					//var josn = { value: this.last_name, text: this.last_name }
					gender.indexOf(this.gender) >= 0 ? false : gender.push(this.gender)
			  })

			  return gender
		  },
		  agefiltered () {
			  const filtered = this.items.filter(item => {
					return Object.keys(this.filtersFields).every(key => String(item['age']))
			  })

			  // create list for select box filter
			  var age= []; 
			  age.push('');
			  jQuery.each(filtered, function() {
					//var josn = { value: this.last_name, text: this.last_name }
					age.indexOf(this.age) >= 0 ? false : age.push(this.age)
			  })

			  return age
		  },
		},
		mounted() {
			// Set the initial number of items
			this.totalRows = this.items.length
		},
		methods: {
		  showModal() {
			this.$refs['my-modal'].show()
		  },
		  hideModal() {
			this.$refs['my-modal'].hide()
		  },
		  toggleModal() {
			// We pass the ID of the button that we want to return focus to
			// when the modal has hidden
			this.$refs['my-modal'].toggle('#toggle-btn')
		  },
		  info(item, index, button) {
			this.infoModal.title = `Row index: ${index}`
			//this.infoModal.content = JSON.stringify(item, null, 2)

			this.infoModal.content = item

			this.$root.$emit('bv::show::modal', this.infoModal.id, button)
		  },
		  iframeinfo(item, index, button) {
			this.iframeinfoModal.title = `Row index: ${index}`
			this.$root.$emit('bv::show::modal', this.iframeinfoModal.id, button)
			
			setTimeout(()=>{
			  this.loadIframe()
			  console.log('#############')
			}, 100)

		  },
		  okInfoModal() {
			console.log(JSON.stringify(this.items));

			//this.infoModal.title = ''
			//this.infoModal.content = ''
		  },
		  loadIframe() {
			$("#detailContent").html('<iframe width="100%" height="100%" frameborder="0" scrolling="yes" allowtransparency="true" src="http://localhost/fleet/keith/test-index"></iframe>');
		  },
		  okIframeInfoModal() {
			
			console.log(JSON.stringify(this.items));
		  },
		  closeModal() {
			this.$refs['my-modal'].hide()
		  },
		  closeIframeModal() {
			this.$refs['my-iframemodal'].hide()
		  },
		  onFiltered(filteredItems) {
			// Trigger pagination to update the number of buttons/pages due to filtering
			this.totalRows = filteredItems.length
			this.currentPage = 1
			}
		}
      })

</script>
