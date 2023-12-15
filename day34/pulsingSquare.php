<style>
    #pulsingSquare {
        width: 150px;
        height: 150px;
        border-radius: 10px;
        background-color: goldenrod;
        transition: 1s;
    }
</style>
<div id="pulsingSquare"></div>
<script>
    document.querySelector("#pulsingSquare").addEventListener("click", (event) => {
        event.target.style.transform = "scale(1.5)";
        setTimeout(() => {
            event.target.style.transform = "scale(1)";
        }, 500);
    })
</script>