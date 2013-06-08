// This may later take in json data directly
function BoxObject( var type, var date, var title, var url)
{
    var box = new Object();
    box.type = type;
    box.date = date;
    box.title = title;
    box.url = url;
    // etc, etc.
    return box;
}

function makeDivBox(var boxObj)
{
    var boxId;
    switch(boxObj.type)
    {
        case 'photo':
            boxId = "box1";
            break;
        case 'quote':
            boxId = "box2";
            break;
        case 'link':
            boxId = "box3";
            break;
        case 'video':
            boxId = "box7";
            break;
        default:
            // For text and special post types
            boxId = "box4";
            break;
    }
    
    var box_div = '<div id="'+boxId+'"><div><p id="date">'+boxObj.date+'</p></div><div id="title"><p>'+boxObj.title+'</p></div></div>';

    $('.main-boxes').append(box_div);
}

function getPosts()
{
    console.log("Start getPosts");
    $.getJSON("http://api.tumblr.com/v2/blog/blackfemalecoders.tumblr.com/posts?api_key=IfkD8OB9BOg9V0MU2gbpMP1uxQDoFjMAXUEe1YDUNGnG4PkFGg", function(data) {
        $('.main-boxes').append(data);
        alert("It's happeningggggg!");
    });
    console.log("End getPosts");
}
