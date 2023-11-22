<template>
    <div>
        <div class="section_1">
            <div class="section1_content">
                <div class="section_1_img">
                    <img src="@/assets/img/contact.svg" alt="Beranda">
                </div>
                <div class="section-text">
                    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Di dalam tag <style scoped> di file Vue component Anda */

.section_1 {
    background: linear-gradient(to bottom, #ff9900, #ff5e62);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80vh;
}

.section1_content {
    background-color: #ffffff;
    color: #333333;
    font-family: 'Arial', sans-serif;
    border-radius: 15px;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
    width: 80%;
    max-width: 500px;
    padding: 40px;
    text-align: center;
}

.section_1_img img {
    width: 70%;
    height: auto;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 10px;
}

.form-control {
    width: calc(100% - 20px);
    padding: 15px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

.btn-primary {
    background-color: #ff5e62;
    color: #ffffff;
    border: none;
    border-radius: 25px;
    padding: 15px 35px;
    font-size: 18px;
    cursor: pointer;
    transition: 0.3s ease;
}

.btn-primary:hover {
    background-color: #ff3d43;
    transform: scale(1.05);
}

.btn-primary:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(255, 94, 98, 0.25);
}

/* Efek Hover untuk Tautan */
a:hover {
    color: #ff5e62;
    text-decoration: underline;
}



    .section1_content h1 {
        font-size: 48px;
    }
    .section1_content p {
        margin-bottom: 20px;
    }
    @media screen and (max-width: 600px) {
        .section_1 {
            flex-direction: column;
            padding: 20px 20px;
        }
        .section1_content {
            width: 100%;
            padding: 30px 0;
        }
        .section_1_img {
            width: 100%;
        }
        }
</style>