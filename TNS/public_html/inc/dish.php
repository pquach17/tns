<html>
<head></head>
<body>
<form action="submit" >
<table>
	<tr>
		<th>Name</th>
		<th>Ingredients</th>
		<th>Price</th>
		<th>Spicy</th>
		<th>Vegie</th>
		<th></th>
	</tr>
	<tr>
		<td><input type="text" name="txtName"></td>
		<td><textarea name="txtIngredient" rows="1"></textarea></td>
		<td>$<input type="text" name="txtPrice"></td>
		<td><select name="cboSpicy">
			<option>yes</option>
			<option>no</option>
			</select>
		</td>
		<td>
			<select name="cboVegie">
				<option>yes</option>
				<option>no</option>
			</select>
		</td>
		<td><input type="button" name="btnSubmit" value="Add"></td>
	</tr>
</table>
</form>
</body>

</html>
