<?php
/**
 * Created by JetBrains PhpStorm.
 * User: johannes
 * Date: 5/7/14
 * Time: 10:27 AM
 * To change this template use File | Settings | File Templates.
 */

    $category = new category_model();
    $analyses = new analys_result_model();

    /* Get All countries */
    $countryList  = $analyses->getCountries();

    // /* Get All without country*/
    $categoryList = $category->getCategories();

?>
<div class="url_preview_heading">
    <div class="search_filter_button">
        <button class="url_preview_buttons" id="search_filter_btn"> Search + Filter</button>
    </div>
    <div class="url_preview_button">
        <button class="url_preview_buttons" id="download_csv_btn"> Download CSV</button>
    </div>
    <h2>URL Preview</h2>
    <button class="url_preview_edit button" id="edit_cell"> Edit Cell</button>
</div><!--url_preview_heading-->
<div id="table-wrapper">
    <div id="table-scroll">
        <table id="url_preview_table" border="0">
            <thead>
            <tr>
                <th><span class="text">Domain</span></th>
                <th><span class="text">URL</span></th>
                <th><span class="text">PR</span></th>
                <th><span class="text">DA</span></th>
                <th><span class="text">PA</span></th>
                <th><span class="text">Likes</span></th>
                <th><span class="text">Shares</span></th>
                <th><span class="text">Email</span></th>
                <th><span class="text">Contact</span></th>
                <th><span class="text">About Us</span></th>
                <th><span class="text">Twitter</span></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>www.google.com</td> <td>http://www.yahoo.com</td> <td>7</td><td>89</td><td>95</td><td>156324</td><td>564255</td><td>contact</td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>2</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>3</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>4</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td> <td></td> <td></td> <td></td>
            </tr>
            <tr>
                <td>5</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>6</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>7</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>8</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>9</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>10</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>11</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>12</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>13</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>14</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>15</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>16</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>17</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td>18</td><td></td><td></td><td></td><td></td><td></td><td></td> <td></td><td></td><td></td><td></td>
            </tr>

            </tbody>
        </table>
    </div><!--#table-scroll-->
</div><!--#table-wrapper-->

<!--Dialog Windows-->
<!-- Search + Filter Dialog Window-->
<div class="dialog" id="search_filter">
    <div class="body">
        <span class="close">x</span>
        <h6>dialog</h6>
        <div class="content">
            <br>
            <h2>Search and Filter</h2>
            <!--first table-->
            <table border="0" cellspacing="0" cellpading="0" style="float:left; margin-left: 20px;">
                <tr>
                    <td rowspan="2"><button class="big_button">PR</button></td>
                    <td>&nbsp;>&nbsp;<input class="smol_input" value="0" name = "SearchForm[pr-from]" id = "pr-from" /></td>
                </tr>
                <tr>
                    <td>&nbsp;<&nbsp;<input class="smol_input" value="0" name = "SearchForm[pr-to]"  id = "pr-to" /></td>
                </tr>
                <tr>
                    <td rowspan="2"><button class="big_button">DA</button></td>
                    <td>&nbsp;>&nbsp;<input class="smol_input" value="0" name = "SearchForm[da-from]"  id = "da-from" /></td>
                </tr>
                <tr>
                    <td>&nbsp;<&nbsp;<input class="smol_input" value="0" name = "SearchForm[da-to]"  id = "da-to" /></td>
                </tr>
                <tr>
                    <td><button class="big_button">Content Analysis</button></td>
                    <td>
                        <select id = "category-list" name="SearchForm[category]">
                            <option>Select</option>  
                            <?php 
                                foreach ($categoryList as $category) { ?>
                                    <option value = "<?php echo $category['id'];?>"><?php echo $category['categoryName'];?></option>
                        <?php  }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class="big_button">Country</button></td>
                    <td>
                        <select id = "country-list" name="SearchForm[country]"> 
                                <option>Select</option>  
                            <?php 
                                foreach ($countryList as $country) { ?>
                                    <option value = "<?php echo $country['id'];?>"><?php echo $country['keywords'];?></option>
                        <?php   }

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class="big_button">Email</button></td>
                    <td>
                        <select id = "email" name="SearchForm[email]">
                            <option>No</option>
                            <option value="1">Yes</option>
                        </select>
                    </td>
                </tr>
            </table>
            <!-- End first table-->

            <!-- start second table-->
            <table style="float:right; margin-right: 20px;">
                <tr>
                    <th colspan="2" >Include keywords</th>
                </tr>
                <tr>
                    <td width="30%">include</td>
                    <td><input class="include_box" value="Edite Box"/></td>
                </tr>
                <tr>
                    <td><a data-condition = "AND" class = "include-button">AND+</a></td>
                    <td><a data-condition = "OR"  class = "include-button">OR+</a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="SearchForm[include]">
                        </textarea><br>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Exclude keywords</th>
                </tr>
                <tr>
                    <td>exclude</td>
                    <td><input class="exclude_box" value="Edite Box"/></td>
                </tr>
                <tr>
                    <td><a data-condition = "AND" class = "exclude-button">AND+</a></td>
                    <td><a data-condition = "OR"  class = "exclude-button">OR+</a></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="SearchForm[exclude]">
                        </textarea><br>
                    </td>
                </tr>
            </table>
            <!-- end second table-->
            <div style="clear:both; text-align: center;">
                <button class="yellowButton apply-filter">Apply</button>
            </div>

        </div><!--.content-->
    </div><!--.body-->
</div><!--.dialog-->

<!-- Download CSV Dialog Window-->
<div class="dialog" id="download_csv_dialog">
    <div class="body">
        <span class="close">x</span>
        <h6>dialog</h6>
        <div class='content' > 
            <h2>Download CSV</h2>
            <div id='download_csv_content'>
            <input type="radio" class="download_csv_cbx" name='down_method' id="download_csv_cbx_1" value="all" checked>Download All URL's<br/><br/>
            <input type="radio" class="download_csv_cbx" name='down_method' id="download_csv_cbx_2" value="selection" >Download Currently Selected<br/><br/>
            <input type="radio" class="download_csv_cbx" name='down_method' id="download_csv_cbx_3" value="1" >Download All URL's in Filter<br/><br/>

                <label for="download_csv_inp_1">URL list name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" class="" id="download_csv_inp_1" value=""><br/><br/>

                <!--<label for="download_csv_inp_2">URL list description:</label>
                <input type="text" class="" id="download_csv_inp_2" value=""><br/><br/><br/>-->

            <input type="button" class="yellowButton" id="submit_down_csv" value="Send to Download">
            </div></div>
     </div><!--download_csv_dialog_body-->
</div><!--download_csv_dialog_window-->
<!-- Search + Filter Dialog Window-->
<div class="dialog" id="edit_line">
    <div class="body">
        <span class="close">x</span>
        <h6>dialog</h6>
        <div class="content">
            <br>
            <h2>Edit Cell</h2>
            <form method="post" action="<?php echo base_url(); ?>file/edit_cell">
                <div id="for_append"></div>
                <div style="clear:both; text-align: center;">
                    <button class="yellowButton">Apply</button>
                </div>
            </form>
        </div><!--.content-->
    </div><!--.body-->
</div><!--.dialog-->
<script language="javascript" type="text/javascript">
    
    $(function() {
        $('textarea').val('');
        $('.include-button').click(function() {
            var includedKeywords = $('.include_box').val();
            if ( includedKeywords.length == 0 ) {
                alert('Fill Include Keywords Field');
            } else {
                var includeTextArea = $('textarea[name="SearchForm[include]"]').val();
                if ( includeTextArea.length == 0 ) {
                    $('textarea[name="SearchForm[include]"]').val(includedKeywords + ' ');
                } else {
                    var condition = $(this).attr('data-condition');
                    $('textarea[name="SearchForm[include]"]').val($('textarea[name="SearchForm[include]"]').val() + condition +'\n' + includedKeywords + ' ');
                }
            }
        })

        $('.exclude-button').click(function() {
            var excludedKeywords = $('.exclude_box').val();
            if ( excludedKeywords.length == 0 ) {
                alert('Fill Exclude Keywords Field');
            } else {
                var excludeTextArea = $('textarea[name="SearchForm[exclude]"]').val();
                if ( excludeTextArea.length == 0 ) {
                    $('textarea[name="SearchForm[exclude]"]').val(excludedKeywords + ' ');
                } else {
                    var condition = $(this).attr('data-condition');
                    $('textarea[name="SearchForm[exclude]"]').val($('textarea[name="SearchForm[exclude]"]').val() + condition +'\n' + excludedKeywords + ' ');
                }
            }
        })
    $('.apply-filter').click(function() {
        var criteria     = new Object();
        if ($('#pr-from').val())
            criteria.prfrom = $('#pr-from').val();
        if ($('#pr-from').val())
            criteria.prto = $('#pr-to').val();           
        if ($('#da-from').val())
            criteria.dafrom = $('#da-from').val();
        if ($('#da-to').val())
            criteria.dato = $('#da-to').val();
        if ($('#category-list').val())
            criteria.category = $('#category-list').val();
        if ($('#country-list').val())
            criteria.country = $('#country-list').val();
        if ($('#email').val())
            criteria.email = $('#email').val();
        if ($('textarea[name="SearchForm[include]"]'))
            criteria.include = $('textarea[name="SearchForm[include]"]').val();           
        if ($('textarea[name="SearchForm[exclude]"]'))
            criteria.exclude = $('textarea[name="SearchForm[exclude]"]').val();           

        $.ajax({
            url      : '../site/websiteFilter',
            data     : {'criteria':criteria},
            dataType : 'html',
            type     : 'post',
            success:function(data)
            {
                $(".dialog").hide();
                $("#table-scroll").html(data);        
            }
        })
    })



    })
    $( ".close" ).click(function() {
        $(".dialog").hide();
    });
    $( "#search_filter_btn" ).click(function() {
        $("#search_filter").show();
    });
    $( "#download_csv_btn" ).click(function() {
        $("#download_csv_dialog").show();
    });
    $( "#submit_down_csv" ).click(function() { 
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "<?php echo base_url(); ?>download/selectional_download";
        var filename = $('#download_csv_inp_1').val();
        el = document.createElement("input");
        el.type = "hidden";
        el.name = "filename";
        el.value = filename;
        form.appendChild(el);        
        if($('input[name=down_method]:checked').val()=='selection'){
        var selaecteds = $('tr.selected');
         if(selaecteds.length>0)
            {
            selaecteds.each(function () {
            el = document.createElement("input");
            el.type = "hidden";
            el.name = "id[]";
            el.value = $(this).find('td:first').text();
            form.appendChild(el);  
            });
            form.submit();
            }
            else alert('Please select cell');
        }
        else if($('input[name=down_method]:checked').val()=='all'){
        el = document.createElement("input");
        el.type = "hidden";
        el.name = "id";
        el.value = 'all';
        form.appendChild(el);
        form.submit();
        }

        $("#download_csv_dialog").show();
    });

    $('#edit_cell').click(function() {
        var i=0;

        if($('tr.selected').length>0){
            var valArr = $('tr.selected').html().split('</td>');
            $("#for_append").html('');
            $("#table-scroll th").each( function() {
                $("#for_append").append('<div>'+$(this).text()+': <input name="'+$(this).text()+'" value="'+valArr[i].substr(4)+'"></input></div></br>');
                i++;
            });
            $("#edit_line").show();
        }
        else{
            alert('please choose cell');
        }
    });
</script>
