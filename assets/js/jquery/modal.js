function modal_anchor(str,id)
{
    $.ajax({
            type : 'GET',
            url : str,
            data :{id:id},
            success : function(data)
            {
                $('#exampleModal').modal('show');
                $('.modal-body').html(data);
            }
    });
}
function updateNode(str)
{
    var id = str;
    alert(id);
}
function updateNodeEvent(sender, args) {
    args.node.data["Name"] = "Test";
}
var sources = '';
var orgChart = {};
var nodeId = '';
var pid = '';
function orgCharts(urls)
{
    $.getJSON( urls,function (source) {
    var peopleElement = document.getElementById("people");  
    sources = source;
    orgChart = new getOrgChart(peopleElement, {
        clickNodeEvent: clickHandler,   
        primaryFields : ["Name","mob","doj"],
        maxDepth: 40,
        theme: "monica",
        enableEdit: false,
        expandToLevel: 5,
        enableDetailsView: false,
        dataSource: sources
    });
    
});
}
function clickHandler(sender, args) {
     var url ='genealogy/modal';
     nodeId = args.node.id;
     if(nodeId!=1)
     {
        modal_anchor(url,nodeId);
     }
    }
 
function updateNodeEvent(str) {
    var id = str;
    console.log(id);
}