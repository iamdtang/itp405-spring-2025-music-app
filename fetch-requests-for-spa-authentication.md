```js
fetch("/api/albums", {
    method: "GET",
    headers: {
        Accept: "application/json",
    },
})
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    });
```

```js
function getCookie(name) {
    const match = document.cookie.match(
        new RegExp("(^| )" + name + "=([^;]+)")
    );

    return match ? match[2] : null;
}

fetch("/api/albums", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "X-XSRF-TOKEN": decodeURIComponent(getCookie("XSRF-TOKEN")), // Get CSRF token from XSRF-TOKEN cookie
    },
    body: JSON.stringify({ Title: "New Album dude", ArtistId: 5 }),
})
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    });
```
