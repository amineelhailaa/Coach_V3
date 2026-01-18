<div class="shell">
    <section class="left">
        <div class="brand">
            <div class="logo">•</div>
            <div>coachpro</div>
        </div>

        <h1>Create your account</h1>
        <p class="sub">Choose your role, upload a profile photo, then fill in the details.</p>

        <form id="signupForm" action="#" method="post" enctype="multipart/form-data">
            <!-- Avatar upload (preview + upload button beside it) -->
            <div class="avatar-row">
                <div class="avatar">
                    <img id="avatarPreview" alt="Profile photo preview">
                </div>

                <div class="avatar-actions">
                    <div class="row">
                        <input id="avatarInput" name="avatar" type="file" accept="image/*" hidden>
                        <button type="button" class="btn btn-primary" id="uploadBtn">Upload</button>
                        <button type="button" class="btn btn-ghost" id="removeBtn">Remove</button>
                        <span class="file-name" id="fileName">No file selected</span>
                    </div>

                    <div class="help">PNG/JPG/WebP. Max 2MB.</div>
                    <div class="error" id="avatarError">Invalid image. Showing default avatar.</div>
                </div>
            </div>

            <!-- Role switch -->
            <div class="role-switch" role="group" aria-label="Choose role">
                <input type="hidden" name="role" id="roleInput" value="sportif">
                <button type="button" class="role-btn" id="roleSportif" aria-pressed="true" data-role="sportif">
                    <span class="role-pill"></span> Sportif
                </button>
                <button type="button" class="role-btn" id="roleCoach" aria-pressed="false" data-role="coach">
                    <span class="role-pill"></span> Coach
                </button>
            </div>

            <!-- Common fields (BOTH roles) -->
            <div class="field">
                <label for="nom">Nom</label>
                <input class="input <?= (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['nom']; ?>" id="nom" name="nom" type="text">
                <span class="invalid-feedback"><?= $data['nom_err'] ?></span>
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input class="input <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>" id="email" name="email" type="email"  required>
                <span class="invalid-feedback"><?= $data['email_err'] ?></span>

            </div>

            <div class="grid">
                <div class="field">
                    <label for="phone">Phone</label>
                    <input class="input<?= (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['phone']; ?>" id="phone" name="phone" type="tel" required>
                    <span class="invalid-feedback"><?= $data['phone_err'] ?></span>

                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input class="input <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"  id="password" name="password" type="password" required>
                        <button type="button" class="toggle-eye" id="togglePwd" aria-label="Show/Hide password">👁️</button>

                    </div>
                    <span class="invalid-feedback"><?= $data['password_err'] ?></span>

                </div>
            </div>

            <!-- Coach specific fields -->
            <div class="role-section" id="coachFields" hidden>
                <div class="role-title">
                    <strong>Coach profile</strong>
                    <span class="badge">COACH</span>
                </div>

                <div class="grid">
                    <div class="field">
                        <label for="coachExperience">Experience (years)</label>
                        <input class="input" id="coachExperience" name="exp" type="number" min="0" >
                    </div>

                    <div class="field">
                        <label for="coachDisciplines">Disciplines</label>
                        <select id="coachDisciplines" name="sport"  >
                            <option value="">Select a discipline</option>
                            <option value="strength_conditioning">Strength &amp; Conditioning</option>
                            <option value="bodybuilding">Bodybuilding</option>
                            <option value="powerlifting">Powerlifting</option>
                            <option value="crossfit">CrossFit</option>
                            <option value="functional_fitness">Functional Fitness</option>
                            <option value="running">Running</option>
                            <option value="calisthenics">Calisthenics</option>
                            <option value="martial_arts">Martial Arts</option>
                            <option value="boxing">Boxing</option>
                            <option value="yoga">Yoga</option>
                            <option value="pilates">Pilates</option>
                            <option value="nutrition">Nutrition Coaching</option>
                            <option value="rehab_mobility">Rehab &amp; Mobility</option>
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="coachBio">Bio</label>
                    <textarea id="coachBio" name="bio" ></textarea>
                </div>
            </div>

            <!-- Sportif section (kept for JS/CSS consistency, but no extra required fields) -->
            <div class="role-section" id="sportifFields">
                <div class="role-title">
                    <strong>Sportif profile</strong>
                    <span class="badge">SPORTIF</span>
                </div>

                <p class="sub" style="margin: 0;">
                    No extra info needed for sportifs right now.
                </p>
            </div>

            <!-- Role value sent to backend -->
            <input type="hidden" name="role" id="roleInput" value="sportif">

            <div class="actions">
                <button class="btn btn-primary" type="submit">Create account</button>
            </div>

            <div class="foot">
                Already have an account? <a class="link" href="#">Log in</a>
            </div>
        </form>
    </section>

    <aside class="right">
        <div class="hero">
            <h2>Train smarter. Connect faster.</h2>
            <p>Coach Pro links coaches and sportifs with profiles, goals, and session workflows.</p>

            <div class="dots" aria-hidden="true">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </aside>
</div>

<script>
    document.getElementById("roleCoach").addEventListener("click", () => {
        roleInput.value = "coach";
    });
    document.getElementById("roleSportif").addEventListener("click", () => {
        roleInput.value = "sportif";
    });

    // --- Default avatar (inline SVG, no external files) ---
    const defaultAvatarSvg = `
    <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128">
        <defs>
            <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#0B5ED7"/>
                <stop offset="1" stop-color="#0A58CA"/>
            </linearGradient>
        </defs>
        <rect width="128" height="128" rx="64" fill="url(#g)"/>
        <circle cx="64" cy="52" r="22" fill="rgba(255,255,255,.95)"/>
        <path d="M26 112c8-22 24-34 38-34s30 12 38 34" fill="rgba(255,255,255,.92)"/>
        <circle cx="64" cy="64" r="56" fill="none" stroke="rgba(255,255,255,.18)" stroke-width="8"/>
    </svg>
    `;
    const defaultAvatar = "data:image/svg+xml;utf8," + encodeURIComponent(defaultAvatarSvg);

    const avatarPreview = document.getElementById("avatarPreview");
    const avatarInput = document.getElementById("avatarInput");
    const uploadBtn = document.getElementById("uploadBtn");
    const removeBtn = document.getElementById("removeBtn");
    const fileName = document.getElementById("fileName");
    const avatarError = document.getElementById("avatarError");

    function setDefaultAvatar(showError = false) {
        avatarPreview.src = defaultAvatar;
        avatarError.style.display = showError ? "block" : "none";
        fileName.textContent = "No file selected";
        // Clear the file input (so selecting the same file again triggers change)
        avatarInput.value = "";
    }

    // Fallback if the <img> fails for any reason
    avatarPreview.onerror = () => setDefaultAvatar(true);

    // init
    setDefaultAvatar(false);

    uploadBtn.addEventListener("click", () => avatarInput.click());

    removeBtn.addEventListener("click", () => setDefaultAvatar(false));

    avatarInput.addEventListener("change", () => {
        avatarError.style.display = "none";
        const file = avatarInput.files && avatarInput.files[0];
        if (!file) return;

        // Basic validation
        const maxBytes = 2 * 1024 * 1024; // 2MB
        if (!file.type.startsWith("image/") || file.size > maxBytes) {
            setDefaultAvatar(true);
            return;
        }

        fileName.textContent = file.name;

        const reader = new FileReader();
        reader.onerror = () => setDefaultAvatar(true);
        reader.onload = () => {
            // If reader result is empty for some reason, fallback
            if (!reader.result) return setDefaultAvatar(true);
            avatarPreview.src = reader.result;
        };
        reader.readAsDataURL(file);
    });

    // --- Role toggle logic ---
    const roleSportifBtn = document.getElementById("roleSportif");
    const roleCoachBtn = document.getElementById("roleCoach");
    const coachFields = document.getElementById("coachFields");
    const sportifFields = document.getElementById("sportifFields");
    const roleInput = document.getElementById("roleInput");

    function setRole(role) {
        const isCoach = role === "coach";
        roleCoachBtn.setAttribute("aria-pressed", String(isCoach));
        roleSportifBtn.setAttribute("aria-pressed", String(!isCoach));
        coachFields.hidden = !isCoach;
        sportifFields.hidden = isCoach;
        roleInput.value = role;
    }

    roleCoachBtn.addEventListener("click", () => setRole("coach"));
    roleSportifBtn.addEventListener("click", () => setRole("sportif"));

    // --- Password eye toggle ---
    const togglePwd = document.getElementById("togglePwd");
    const password = document.getElementById("password");
    togglePwd.addEventListener("click", () => {
        password.type = password.type === "password" ? "text" : "password";
    });



</script>





