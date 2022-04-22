let comments = [];
loadComments();
var COOK={user_id:''};// cookies array
{
    var re = /(?:^|;\s*)(\w+)\s*=\s*([^;]*)/g;
    var x;
    while (x = re.exec(document.cookie)) COOK[x[1]] = x[2];
}
//alert('COOK.user_id = "'+ COOK.user_id +'"');
document.getElementById('comment-add').onclick = function(){
    let commentName = document.getElementById('comment-name');
    let commentBody = document.getElementById('comment-body');
    let comment = {
        name : commentName.value,
        body : commentBody.value,
        time : Math.floor(Date.now() / 1000)
    }

    commentName.value = '';
    commentBody.value = '';
    comments.push(comment);
    saveComments();
    showComments();
}

function saveComments(){
    localStorage.setItem('comments', JSON.stringify(comments));
}

function loadComments(){
    if (localStorage.getItem('comments')) comments = JSON.parse(localStorage.getItem('comments'));
    showComments();
}

function showComments (){
    let commentField = document.getElementById('comment-field');
    let out = '';
    comments.forEach(function(item){	
		out += `<div class="id1" style="border-radius: 15px 15px 15px 15px; background-color: rgba(255, 255, 255, 0.9); padding: 10px;">`;
        out += `<p class="text-right small" style="font-size: 12pt; color: #606060; font-weight: 500;"><em>${timeConverter(item.time)}</em></p>`;
		out += `<p role="alert" style="font-size: 14pt;"><img width=40 height=40 src="img/5/5.png" style="border-radius: 25px 25px 25px 25px;"> <b>Имя:</b></p>`;	
		//out += `<p role="alert" style="font-size: 14pt;"><b>Имя:</b></p>`;	
        out += `<p class="alert alert-primary" role="alert">${item.name}</p>`
		out += `<p role="alert" style="font-size: 14pt;"><b>Комментарий:</b></p>`;
        out += `<p class="alert alert-success" role="alert">${item.body}</p><br>`; 
		out += `</div>`;
		out += `<br>`;
    });
    commentField.innerHTML = out;
}

function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp * 1000);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;
    return time;
  }