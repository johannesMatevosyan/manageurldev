<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 10:33 AM
 * To change this template use File | Settings | File Templates.
 */
?>
    <h2>User Management</h2>
    <table  align="center">
        <tr>
            <th style="max-width:100px;">Add New User</th>
            <th style="width: 30%;"></th>
            <th style="width:40%;">Active Users</th>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <td style="text-align: right;">Name <input type="text" size="15"></td>
            <td><input type="button" value="Edite User"></td>
            <td rowspan="3">
                <select multiple >
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right;">Email <input type="text" size="15"></td>
            <td></td>

        </tr>
        <tr>
            <td>Password <input type="text" size="15"></td>
            <td></td>

        </tr>
        <tr>
            <td><br/>
                <b>User Permissions</b><br/><br/>
                <div  class="scrolldiv">
                    <ul id="tree1">
                        <li><input type="checkbox"><label>Node 1</label>
                            <ul>
                                <li><input type="checkbox"><label>Node 1.1</label>
                                    <ul>
                                        <li><input type="checkbox"><label>Node 1.1.1</label>
                                    </ul>
                            </ul>
                            <ul>
                                <li><input type="checkbox"><label>Node 1.2</label>
                                    <ul>
                                        <li><input type="checkbox"><label>Node 1.2.1</label>
                                        <li><input type="checkbox"><label>Node 1.2.2</label>
                                        <li><input type="checkbox"><label>Node 1.2.3</label>
                                            <ul>
                                                <li><input type="checkbox"><label>Node 1.2.3.1</label>
                                                <li><input type="checkbox"><label>Node 1.2.3.2</label>
                                            </ul>
                                        <li><input type="checkbox"><label>Node 1.2.4</label>
                                        <li><input type="checkbox"><label>Node 1.2.5</label>
                                        <li><input type="checkbox"><label>Node 1.2.6</label>
                                    </ul>
                            </ul>
                        <li><input type="checkbox"><label>Node 2</label>
                            <ul>
                                <li><input type="checkbox"><label>Node 2.1</label>
                                    <ul>
                                        <li><input type="checkbox"><label>Node 2.1.1</label>
                                    </ul>
                                <li><input type="checkbox"><label>Node 2.2</label>
                                    <ul>
                                        <li><input type="checkbox"><label>Node 2.2.1</label>
                                        <li><input type="checkbox"><label>Node 2.2.2</label>
                                        <li><input type="checkbox"><label>Node 2.2.3</label>
                                            <ul>
                                                <li><input type="checkbox"><label>Node 2.2.3.1</label>
                                                <li><input type="checkbox"><label>Node 2.2.3.2</label>
                                            </ul>
                                        <li><input type="checkbox"><label>Node 2.2.4</label>
                                        <li><input type="checkbox"><label>Node 2.2.5</label>
                                        <li><input type="checkbox"><label>Node 2.2.6</label>
                                    </ul>
                            </ul>
                    </ul>

                </div>
            </td>
            <td></td>

        </tr>
        <tr>
            <td><input type="button" value="Save User"></td>
            <td></td>
        </tr>
    </table>
