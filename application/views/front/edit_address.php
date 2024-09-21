<form method="POST" id="multiStepsForm" action="<?= base_url('home/insert_edit'); ?>" enctype="multipart/form-data">
    <div class="ps-form--review elite">
        <h2 class="alice">Edit Address</h2>
   
        <input type="hidden" name="id" value="<?= $result['id'] ?>">

        <div class="ps-form__group">
            <label class="alice">Address</label>
            <input class="form-control ps-form__input" type="text" name="user_address" value="<?= isset($result['address']) ? $result['address'] : ''; ?>" id="user_email" class="form-control" placeholder="address" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">City</label>
            <input class="form-control ps-form__input" type="text" name="user_city" value="<?= isset($result['city']) ? $result['city'] : ''; ?>" id="user_email" class="form-control" placeholder="city" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">Zipcode</label>
            <input class="form-control ps-form__input" type="text" name="user_zipcode" value="<?= isset($result['zipcode']) ? $result['zipcode'] : ''; ?>" id="user_email" class="form-control" placeholder="zipcode" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">State</label>
            <input class="form-control ps-form__input" type="text" name="user_state" value="<?= isset($result['state']) ? $result['state'] : ''; ?>" id="user_email" class="form-control" placeholder="State" aria-label="john.doe" required>
        </div>
        <div class="ps-form__submit borderland">
            <button type="submit" name="submit" value="submit" class="editbtns">Submit</button>
        </div>
    </div>
</form>
   


<style>
    .editbtns {
        border-radius: 20px;
        padding: 10px 50px;
        font-size: 20px;
        color: white;
        background: #2f4f4f;
    }

    .editbtns:hover {
        color: #2f4f4f;
        background-color: white;
        border: 1px solid #2f4f4f;
    }

    .alice{
        color: #2f4f4f;
    }
</style>