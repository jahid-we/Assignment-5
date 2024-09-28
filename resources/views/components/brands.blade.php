<div class="section ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Brands</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div id="TopBrandItem" class="row align-items-center justify-content-center">

        </div>
    </div>
</div>

<style>
    .categories_box {
        position: relative;
        text-align: center;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        overflow: hidden;
        padding: 20px;
        height: 250px; /* Fixed height for all cards */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .categories_box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .categories_box img {
        width: 100%;
        height: 150px; /* Set fixed height for the image */
        object-fit: cover; /* Ensures the image scales correctly within the box */
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .categories_box:hover img {
        transform: scale(1.05);
    }

    .categories_box span {
        display: block;
        margin-top: 10px;
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .p-2 {
        padding: 15px;
    }
</style>

<script>
    TopBrands();
    async function TopBrands(){
        let res = await axios.get("/carlist");
        $("#TopBrandItem").empty();
        res.data['data'].forEach((item, i) => {
            let EachItem = `
                <div class="p-2 col-6 col-md-3 col-lg-2">
                    <div class="item">
                        <div class="categories_box">
                            // <a href="/by-brand?id=${item['id']}">
                                <img src="${item['image']}" alt="${item['brand']}"/>
                                <span>${item['brand']}</span>
                            </a>
                        </div>
                    </div>
                </div>`;
            $("#TopBrandItem").append(EachItem);
        });
    }
</script>
