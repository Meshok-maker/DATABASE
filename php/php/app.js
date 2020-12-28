const current_host = window.location.host;

function update_values(url) {
    const request = async (url) => {
        const json = await fetch(url).then(response => response.json());
        for (const k in json) {
            if (json.hasOwnProperty(k) && document.getElementById(k) !== null) {
                document.getElementById(k).value = json[k];
            }
        }
    }
    return request(url);
}