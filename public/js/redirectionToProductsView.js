document.getElementById("productForm").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Create a new FormData object to serialize the form data
    const formData = new FormData(this);

    // Make a POST request to create the product
    fetch("/products/createProduct", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if (response.status === 201) {
                // If the POST request is successful (status code 201 Created),
                // parse the response JSON to get the created product data
                return response.json();
            } else {
                // Handle errors here, such as displaying an error message to the user
                console.error("Failed to create product");
                throw new Error("Failed to create product");
            }
        })
        .then((createdProduct) => {
            // Redirect to the newly created product's page without making another POST request
            window.location.href = "/products"; // Example redirection
        })
        .catch((error) => {
            // Handle any errors that occurred during the fetch or processing
            console.error("Error:", error);
        });
});
