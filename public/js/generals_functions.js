/* A function that changes the theme of the page. */
if (localStorage.dark == 1 || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
	localStorage.dark = 1;
	document.documentElement.classList.add('dark');
} else {
	localStorage.dark = 0;
	document.documentElement.classList.remove('dark');	
}

/* A function that changes the theme of the page. */
document.querySelectorAll(".setMode").forEach(item =>
    item.addEventListener("click", () => {
        if (localStorage.dark == 1) {
            localStorage.dark = 0;
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.dark = 1;
            document.documentElement.classList.add('dark');
        }
    })
)