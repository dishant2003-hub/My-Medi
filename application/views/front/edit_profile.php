<form method="POST" id="multiStepsForm" action="<?= base_url('home/profile_edit'); ?>" enctype="multipart/form-data">
    <div class="ps-form--review elite">
        <h2 class="alice">Edit Address</h2>

        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <div class="ps-form__group">
            <label class="alice">First Name</label>
            <input class="form-control ps-form__input" type="text" name="user_firstname" value="<?= isset($result['fname']) ? $result['fname'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">Last Name</label>
            <input class="form-control ps-form__input" type="text" name="user_lastname" value="<?= isset($result['lname']) ? $result['lname'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">Email</label>
            <input class="form-control ps-form__input" type="email" name="user_email" value="<?= isset($result['email']) ? $result['email'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">Dob</label>   
            <input class="form-control ps-form__input" type="text" name="user_dob" value="<?= isset($result['dob']) ? $result['dob'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group"> 
            <label class="alice">Mobile</label>
            <input class="form-control ps-form__input" type="text" name="user_mobile" value="<?= isset($result['mobile']) ? $result['mobile'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>
        <div class="ps-form__group">
            <label class="alice">Gender</label>
            <input class="form-control ps-form__input alice" type="text" name="user_gender" value="<?= isset($result['gender']) ? $result['gender'] : ''; ?>" class="form-control" aria-label="john.doe" required>
        </div>

        <input class="form-control ps-form__input" type="hidden" name="user_password" value="<?= isset($result['password']) ? $result['password'] : ''; ?>" class="form-control" aria-label="john.doe">


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