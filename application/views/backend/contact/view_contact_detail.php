<div class="row">
    <div class="col-6">
        <div class="info-container">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <span class="fw-bold me-2">Name:</span>
                    <p><?= isset($rowData['full_name']) ? $rowData['full_name'] : ''; ?></p>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Email:</span>
                    <p><?= isset($rowData['email']) ? $rowData['email'] : ''; ?></p>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Type:</span>
                    <p><?= isset($rowData['type']) && $rowData['type'] == "1" ? 'Technical' : 'Sales'; ?></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="info-container">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <span class="fw-bold me-2">Mobile:</span>
                    <p><?= isset($rowData['mobile']) ? $rowData['mobile'] : ''; ?></p>
                </li>
                <li class="mb-3">
                    <span class="fw-bold me-2">Country:</span>
                    <p><?= isset($rowData['country']) ? $rowData['country'] : ''; ?></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-12">
        <div class="info-container">
            <ul class="list-unstyled">
                <li class="mb-3">
                    <span class="fw-bold me-2">Message:</span>
                    <p><?= isset($rowData['message']) ? $rowData['message'] : ''; ?></p>
                </li>
            </ul>
        </div>
    </div>
</div>

