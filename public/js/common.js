/**
 * Created by eddie on 17-4-14.
 */
function addRecentImgs(parentdoc, imgjson){
    for(i=0;i<imgjson.size();i++){
        var outdiv = document.getElementById("xxxParentdiv");
        var div = document.createElement("div");
        var img = document.createElement("img");
        var bt1 = document.createElement("button");
        var bt2 = document.createElement("button");
        div.append(img);
        div.append(bt1);
        div.append(bt2);
        outdiv.appen(div);

    }
}