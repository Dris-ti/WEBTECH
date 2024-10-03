function hide()
{
    const btn = document.querySelector("#toggleButton");
    const div = document.querySelector(".historyDiv");

    if(div.style.display === "none")
    {
        div.style.display = "block";
    }
    else
    {
        div.style.display = "none";
    }
}