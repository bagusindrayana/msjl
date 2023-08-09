<div class="row">
    <div class="col-md-6">
        
        <div class="form-group">
            <label for="nama">Nama <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Nama..." type="text" name="nama"
                value="{{ old('nama', @$user->nama) }}" required minlength="1" maxlength="100" />
            @error('nama')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="role">Role <small class="text-danger">*</small></label>
            <select name="role" id="role" class="form-control">
                <option value="staf" @if(old("role",@$user->role)=='staf') selected @endif>Staf</option>
                <option value="admin" @if(old("role",@$user->role)=='admin') selected @endif>Admin</option>
            </select>
            @error('role')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
       
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="username">Username <small class="text-danger">*</small></label>
            <input class="form-control" placeholder="Username..." type="text" name="username"
                value="{{ old('username', @$user->username) }}" required minlength="5" maxlength="20" />
            @error('username')
                <span class="text-xs text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        @if (isset($user))
            <div class="form-group">
                <label for="password_baru">Password Baru (kosongkan jika tidak ingin merubah password) <small class="text-danger">*</small></label>
                <input class="form-control" placeholder="Passwrod..." type="password" name="password_baru"
                    autocomplete="off" aria-autocomplete="off" autocomplete="off" minlength="6" maxlength="50" />
                @error('password_baru')
                    <span class="text-xs text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @else
            <div class="form-group">
                <label for="password">Password <small class="text-danger">*</small></label>
                <input class="form-control" placeholder="Passwrod..." type="password" name="password"
                    autocomplete="off" aria-autocomplete="off" autocomplete="off" required minlength="6" maxlength="50" />
                @error('password')
                    <span class="text-xs text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @endif
        
    </div>


</div>