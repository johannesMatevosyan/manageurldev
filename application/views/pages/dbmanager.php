<!--
/**
*************************************************
** File: dbmanager.php  **
** Date: 07.05.2014     **
** Time: 9:48 AM    **
** @author Hovhannes Matevosyan **
** Description: This file accepts new headers from users and sends them to database **
*************************************************
*/
-->
<h2>Database Management</h2>

<form id="comment" method="post" class="db_manager">
<table  align="center">
    <tr>
        <th>Add New Header</th>
        <th style="width: 30%;"></th>
        <th>URL Database Headers</th>
    </tr>
    <tr>
        <th>&nbsp;</th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td>
			<input type="text" size="20" name="header_title" id="header_title" placeholder="Name">
		</td>
        <td>
        </td>
        <td rowspan="5">
            <select name="url_db_headers" id="url_db_headers" class="db_header_results" multiple >
          <!-- Display headers from database -->
            </select>
        </td>
    </tr>
    <tr>
        <td>
			<input type="radio" name="alpha_num" id="alpha" value="alpha" checked>Alpha &nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td>
			<input type="button" class="editHeader button" value="Edit">
		</td>
    </tr>
    <tr>
        <td><input type="radio" name="alpha_num" id="numeric" value="numeric"> Numeric</td>
        <td></td>
    </tr>
    <tr>
        <td>
			<input type="checkbox" name="editable_cbx" id="editable_checkbox" value="1" checked> Editable
		</td>
        <td><input type="button" class="deleteHeader button" value="Delete"></td>
    </tr>
    <tr>
        <td><input type="button" class="addHeader" value="Add New Header"></td>
        <td></td>
    </tr>
</table>
</form>