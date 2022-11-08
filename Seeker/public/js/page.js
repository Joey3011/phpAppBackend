(function(){
const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("paginated-list");
const listItems = paginatedList.querySelectorAll(".form-elements_issue");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");
const submit = document.getElementById("butRev");
submit.setAttribute("disabled", true);
const paginationLimit = 1;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;
const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
};
const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
};
const handlePageButtonStatus = () => {
    if(currentPage === 1){
        disableButton(prevButton);
    }else{
        enableButton(prevButton);
    }

    if(pageCount === currentPage){
        disableButton(nextButton);
        enableButton(submit);
    }else{
        enableButton(nextButton);
        disableButton(submit);
    }
};
const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-numbers").forEach((button) => {
        button.classList.remove("active");
        const pageIndex = Number(button.getAttribute("page-index"));

        if(pageIndex == currentPage){
            button.classList.add("active");

        }
    });
}
const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-numbers";
    pageNumber.innerHTML = index;

    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    paginationNumbers.appendChild(pageNumber);
};
const getPaginationNumbers = () => {
    for(let i = 1; i <= pageCount; i++){
        appendPageNumber(i);
    }
};
const setCurrentpage = (pageNum) => {
    currentPage = pageNum;
    handleActivePageNumber();
    handlePageButtonStatus();
    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    listItems.forEach((item, index) => {
        item.classList.add("hide");

        if(index >= prevRange && index < currRange){
            item.classList.remove("hide");
        }
    });
};
window.addEventListener("load", () => {
    getPaginationNumbers();
    setCurrentpage(1);
    prevButton.addEventListener("click", () => {
        setCurrentpage(currentPage - 1);
    });
    nextButton.addEventListener("click", () => {
        setCurrentpage(currentPage + 1);
    });
    document.querySelectorAll(".pagination-numbers").forEach((button) => {
        const pageIndex = Number(button.getAttribute("page-index"));
        if(pageIndex){
            button.addEventListener("click", () => {
                setCurrentpage(pageIndex);
            });
        }
    });
});
})();