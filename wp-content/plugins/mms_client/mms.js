function popconfirm(actionlink, closelink, deletecode) {
    $('.popupdialog').html('<img src="'+site_url+'img/processing.gif " alt="processing" />');
    $.post(actionlink,
    {
        deletecode: deletecode
    },
    function(data) {
        if(data.result) {
            $('.popupdialog').html('<div id="popup_content">' + data.result + '</div><br /><br /><a id="close_link" href="' + closelink + '"><input class="formbutton" value="Close" type="button" /></a>');
            $('.dim').click(function () {
                return false;
            });
        }
    }, 'json');
}
function save_data(table, field, id, field_element) {
    $.post(mms_site_url+'libraries/cms_data.php', {
        table: table,
        field: field,
        id: id,
        value: $(field_element).val(),
        request_type: 'post'
    },
    function(data) {
        if(data.result) {
            $('#save_response').html(data.result);
            $('#trigger_response').trigger('click');
        }
    }, 'json');
}
function rbt_save_data(table, id) {
    $.post(mms_site_url+'libraries/cms_data.php', {
        table: table,
        id: id,
        smart_rbt_keyword: $('#smart_rbt_'+id).val(),
        globe_rbt_keyword: $('#globe_rbt_'+id).val(),
        sun_rbt_keyword: $('#sun_rbt_'+id).val(),
        request_type: 'post_rbt'
    },
    function(data) {
        if(data.result) {
            $('#save_response').html(data.result);
            $('#trigger_response').trigger('click');
        }
    }, 'json');
}




function show_album(artist_id) {
    $('.album_container').hide();
    $.post(mms_site_url+'libraries/cms_api.php', {
        artist_id: artist_id
    },
    function(data) {
        if(data.albums) {
            var albumtable = '<table class="mms_album_table" cellpadding="3" cellspacing="0">';
            for (album_id in data.albums) {
                albumtable += album_builder(album_id, data.albums[album_id].album_title);
                albumtable += '<tr><td colspan="4" align="center"><table class="mms_album_table" cellpadding="3" cellspacing="0">';
                albumtable += '<tr><th width="25%" class="mms_album_th">Song Name</th>';
                albumtable += '<th width="25%" class="mms_album_th">New Single</th>';
                albumtable += '<th width="25%" class="mms_album_th">Top Download</th>';
                albumtable += '<th width="25%" class="mms_album_th">RBT Keyword</th></tr>';
                for (song_id in data.albums[album_id].songs) {
                    albumtable += song_builder(song_id, data.albums[album_id].songs[song_id].song_title);
                }
                albumtable += '</table></td></tr>';
            }
            albumtable += '</table>';
            $('#album_container_'+artist_id).html(albumtable);
            $('#album_container_'+artist_id).fadeIn('slow');
        }
    }, 'json');
}

function song_builder(song_id, song_title) {
    var new_single = '';
    var new_single_rank = '';
    var top_download = '';
    var top_download_rank = '';
    var smart_rbt_keyword = '';
    var globe_rbt_keyword = '';
    var sun_rbt_keyword = '';
    var albumtable = '';
    jQuery.ajaxSetup({async:false});
    $.get(mms_site_url+'libraries/cms_data.php', {
        table: 'loc_song',
        field: 'id',
        value: song_id,
        request_type: 'get'
    },
    function(data){
        if (data !== null) {
            if (data.new_single == "1"){
                new_single = 'checked="checked"';
            }
            if (data.top_download == "1"){
                top_download = 'checked="checked"';
            }
            smart_rbt_keyword = data.smart_rbt_keyword;
            globe_rbt_keyword = data.globe_rbt_keyword;
            sun_rbt_keyword = data.sun_rbt_keyword;
         
        }
    }, 'json');
    jQuery.ajaxSetup({async:true});
    albumtable += '<tr><td class="mms_album_td" align="center">'+song_title+'</td>';
    albumtable += '<td class="mms_album_td" align="center"><input onclick="toggle_checkbox(\'loc_song\', \''+song_id+'\', \'new_single\', \'song_new_single\')" class="mms_checkbox" '+new_single+' type="checkbox" name="song_new_single_'+song_id+'" id="song_new_single_'+song_id+'"></td>';
    albumtable += '<td class="mms_album_td" align="center"><input onclick="toggle_checkbox(\'loc_song\', \''+song_id+'\', \'top_download\', \'song_top_download\')" class="mms_checkbox" '+top_download+' type="checkbox" name="song_top_download_'+song_id+'" id="song_top_download_'+song_id+'"></td>';
    albumtable += '<td class="mms_album_td" align="right">';
    albumtable += 'Smart:<input maxlength="20" type="text" class="mms_rbt" id="smart_rbt_'+song_id+'" value="'+smart_rbt_keyword+'"><br />';
    albumtable += 'Globe:<input maxlength="20" type="text" class="mms_rbt" id="globe_rbt_'+song_id+'" value="'+globe_rbt_keyword+'"><br />';
    albumtable += 'Sun:<input maxlength="20" type="text" class="mms_rbt" id="sun_rbt_'+song_id+'" value="'+sun_rbt_keyword+'"><br />';
    albumtable += '<a href="#save_response" ';
    albumtable += 'onclick="rbt_save_data(\'loc_song\', \''+song_id+'\')"><img class="mms_image" src="'+mms_plugin_directory+'images/save_icon.gif" /></a></td></tr>';
    return albumtable;
}



function album_builder(album_id, album_title) {
    var new_release = '';
    var new_release_rank = '';
    var top_album = '';
    var top_album_rank = '';
    var albumtable = '';
    jQuery.ajaxSetup({async:false});
    $.get(mms_site_url+'libraries/cms_data.php', {
        table: 'loc_album',
        field: 'id',
        value: album_id,
        request_type: 'get'
    },
    function(data){
        if (data !== null) {
            if (data.new_release == "1"){
                new_release = 'checked="checked"';
            }
            if (data.top_album == "1"){
                top_album = 'checked="checked"';
            }
        }
    }, 'json');
    jQuery.ajaxSetup({async:true});
    albumtable += '<tr><td class="mms_album_td" align="center">Album: <b> '+album_title+'</b></td>';
    albumtable += '<td class="mms_album_td" align="center">Add to New Releases: <input onclick="toggle_checkbox(\'loc_album\', \''+album_id+'\', \'new_release\', \'album_new_release\')" class="mms_checkbox" '+new_release+' type="checkbox" name="album_new_release_'+album_id+'" id="album_new_release_'+album_id+'"></td>';
    albumtable += '<td class="mms_album_td" align="center">Add to Top Albums: <input onclick="toggle_checkbox(\'loc_album\', \''+album_id+'\', \'top_album\', \'top_album\')" class="mms_checkbox" '+top_album+' type="checkbox" name="top_album_'+album_id+'" id="top_album_'+album_id+'"></td></tr>';
    return albumtable;
}

function toggle_checkbox(table, id, field, field_element_name) {
    var checkbox = 0;
    if ($('#'+field_element_name+'_'+id).attr('checked') == 'checked') {
        checkbox = 1;
    }
    $.post(mms_site_url+'libraries/cms_data.php', {
        table: table,
        field: field,
        id: id,
        value: checkbox,
        request_type: 'post'
    },
    function(data) {
        if(data.result) {
            $('#save_response').html(data.result);
            $('#trigger_response').trigger('click');
        }
    }, 'json');


}
