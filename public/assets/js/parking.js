/**
 * Created by andy on 16/05/2017.
 */
var zonetype="";
var dataType=function(e){
    zonetype=type=$(e).data('type');
};
var splet = function (){
    var type = document.querySelector(".selectpicker").value;
    var zone = zonetype;
    var quantity =  document.querySelector(".quantity").value;
    var step = window.location.href.split("/");
    var _token =document.querySelector("#_token").value;
    console.log(_token);

    if(zone !=undefined && type !=undefined && quantity !=undefined ){
        var req = $.ajax({
            url:"/create-parking/splet",
            type:"POST",
            dataType:"json",
            data:{
                "type":type,
                "zone":zonetype,
                "quantity":quantity,
                "step":step.pop(),
                "_token":_token
            }
        });
        req.done(function(data){

           if(data.success){
               window.location= data.route;
           } else{

           }
        });
        req.fail(function(error){    });

    }

};

var createItem = function(type,value,opt){
    var i,d,e,t;
    if(type == 'input'){
        var pl="";
        t = value.split("-");
            for(var j=0;j<= t.length -1 ; j++){
               pl = pl+" "+t[j];
            }
        e = document.createElement("div");
        i = document.createElement("input");
        i.setAttribute('type',"number");
        i.setAttribute("class","form-control");
        i.setAttribute("required", "required");
        i.setAttribute("data-type",value);
        i.setAttribute("placeholder", pl);
        //i.setAttribute(, value);
        i.addEventListener("keyup",adicionImg,true);
        e.setAttribute("class","form-group");
        e.eve
        e.appendChild(i);
        i=e;
    }else if(type == 'img'){
        e = document.createElement("div");
        i = document.createElement("img");
        i.setAttribute("src",url+"Icon-"+value+".png");
        i.style.width="100%";
        i.setAttribute("class","media-object");
        e.setAttribute("class" ,"media col-md-4 col-lg-4  col-sm-4 col-xs-4");
        e.append(i);
        i = e;
    }else{

        i = document.createElement("span");
        i.setAttribute("class" ,"media col-md-4 col-lg-4  col-sm-4 col-xs-4 find");
        i.setAttribute("data-leng",type);
        i.append(document.createTextNode(type+" camas más en existencia."));
        type="img";
    }
    d = document.createElement("div");
    d.setAttribute("class","content-"+type+" "+opt);
    d.append(i);
    return d;

};

var adicionImg = function(vm,dool) {

    var listIcon = [];
    listIcon['cama-de-agua'] = "Cama-Agua";
    listIcon['cama-individual'] = "Cama-Individual";
    listIcon['cama-matrimonial'] = "Cama-Matrimonio";
    listIcon['litera'] = "Litera";
    listIcon['cuna'] = "Cuna";
    listIcon['colchon'] = "Cama-Colchon";
    listIcon['cama-de-ninos'] = "Cama-ninos";
    listIcon['sofa'] = "Sofa";
    listIcon['sofa-cama'] = "Sofa-Cama";
    listIcon['hamaca'] = "Hamaca";

    var e;
    var sl="";
    if (dool ==true) {
        e = vm.value;
        sl = $(vm).data("type");
    } else{
        sl=$(this).data("type");
        e = this.value;
    }

    var i = 1;

    var conteElement = $(".contentImg");
    var lengthItem = conteElement[0].childElementCount;

    if(lengthItem > 0){
        var x,y;
        var a = false;
        var u = sl != undefined? sl.split(' '): "";
        var contimg = $(".contentImg > .content-img."+u[u.length-1]);

        if(contimg.length > 0){
            for(var j =0 ; j <= contimg.length-1 ; j++){
                contimg[j].remove();
            }
        }
        x = 6-lengthItem;
        if(6==lengthItem ){
            var elemt = $(".contentImg > .content-img");
            var as = elemt.find(".find");
            var item = as.data("leng");
           // if()

            as.parent().remove();
            e=parseInt(e)+parseInt(item);
        }
        if( x <= e ){
           y=e;
           e=  lengthItem - 5;
           a = true;

        }

        for(i; i <= e; i++){
            conteElement.append(createItem('img', listIcon[sl], sl));
            y=y-1;
        }
        if(a==true){
            conteElement.append(createItem(y, listIcon[sl],sl));
        }
    }else{

        for(i; i <= e; i++){
            conteElement.append(createItem('img',listIcon[sl],sl));
        }
    }



};
