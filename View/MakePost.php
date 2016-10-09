<?php
namespace View;

class MakePost
{
	public function render() {
		echo "<!DOCTYPE html>
					<html>
					<head>
					<meta charset=\"UTF-8\">
					<title>Insert title here</title>
					</head>
					<style>
					label {
					display:block;
					}
					</style>
					<body>
					
					<form enctype=\"multipart/form-data\" method='post'  action=''>
							<label for='title'>Title</label>
						 <input type ='text' name='title' id='title'>
						 
						  <label for='year'>Year</label>
						 <input type ='text' name='year' id='year'>
						  <label for='price'>Price</label>
						 <input type ='text' name='price' id='price'>
						  <label for='description'>Description</label>
						 <input type ='text' name='description' id='description'>
						 
						 	 <label for='Files'>Add Pics</label>
						 
						 <input type=\"file\" name=\"file[]\" id=\"fileField\" multiple=\"multiple\"/>
							<button type=\"submit\">Send</button>
					
							</form>
					</body>
					</html>";
	}
}