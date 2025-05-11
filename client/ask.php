<div class="container">

    <h2 class="heading mb-3 mt-3">Ask a Question</h2>

    <form action="./server/requests.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="title" class="form-label">Title: 
                <?php
                error("title_error", 5000);
                ?>
            </label>
            <input type="text" class="form-control" id="title" name="title" value="<?php value("title")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="description" class="form-label">Description: 
                <?php
                error("description_error", 5000);
                ?>
            </label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php value("description")?></textarea>
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="category_id" class="form-label">Category: 
                <?php
                error("category_id_error", 5000);
                ?>
            </label>
            <select class="form-select" name="category_id" id="category_id">
            <option value=''>Select a category</option>
                <?php include('./client/category.php'); ?>
            </select>
        </div>
        <button type="submit" name="ask" class="btn btn-primary mt-3 col-sm-6 offset-sm-3">Ask Question</button>
    </form>

</div>