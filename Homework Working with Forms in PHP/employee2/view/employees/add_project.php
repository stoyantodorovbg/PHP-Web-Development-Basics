<h1>Add project</h1>

<form method="post" action="?controller=EmployeeController&action=addProject&employee_id=<?=!empty($_GET['employee_id'])?>"&employe_id=".$_GET['employee_id']">
Name: <input type="text" name="name" value=""/>
<br/>
Description: <input type="text" name="description" value=""/>
<br/>
End date: <input type="text" name="end_date" value=""/>
<br/>
<input type="submit" name="save" value="save">
<input type="submit" name="cancel" value="cancel">
</form>
