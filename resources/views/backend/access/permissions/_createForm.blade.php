<form action="/admin/access/permissions" method="post" @keydown="errors.clear($event.target.name)">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" v-model="{{ $data }}.name" required>
        <span class="help-block red" v-if="errors.has('name')" v-text="errors.get('name')"></span>
    </div>

    <div class="form-group">
        <label for="display-name">Display Name</label>
        <input type="text" class="form-control" name="display-name" v-model="{{ $data }}.display_name" required>
        <span class="help-block red" v-if="errors.has('display_name')" v-text="errors.get('display_name')"></span>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" v-model="{{ $data }}.description" required>
        <span class="help-block red" v-if="errors.has('description')" v-text="errors.get('description')"></span>
    </div>
</form>