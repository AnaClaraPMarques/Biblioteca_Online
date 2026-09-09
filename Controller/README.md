//FITCALC BASE - EXEMPLO

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }
    /**
     * Validação de campos vazios
     * @param string $user_fullname Nome do usuário ou nickname
     * @param string $email Email 
     * @param string $password Senha
     * @return bool Falso se estiver vazio, Verdadeiro se estiver preenchido
     */
    private function validateEmptyFields(string $user_fullname, string $email, string $password): bool
    {
        if (empty($user_fullname) or empty($email) or empty($password)) {
            return false;
        }

        return true;
    }
    /**
     * Validação de E-mail válido
     * @param string $email E-mail
     * @return bool Falso se não estiver no padrão de e-mail e verdadeiro caso esteja
     */
    private function validateUserEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
    /**
     * Validação de senha padrão Regex
     * @param string $password Senha
     * @return bool Verdadeiro se conter o padrão de caracteres e falso se não passar
     */
    public function passwordValidation(string $password): bool
    {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,33}$/';

        return (bool) preg_match($pattern, $password);
    }
    /**
     * Confirmação de senha
     * @param string $password Senha
     * @param string $confirmPassword Confirmação de Senha
     * @return bool Verdadeiro caso seja igual e Falso caso contrário
     */
    public function checkPasswordMatch(string $password, string $confirmPassword): bool
    {
        return $password === $confirmPassword;
    }
    /**
     * Criptografia de Senha com ARGON2ID
     * @param string $password Senha
     * @return string Senha criptografada
     */
    private function hashPassword(string $password): string
    {

        $options = [
            "memory_cost" => 1 << 17,
            "time_cost" => 4,
            "threads" => 2
        ];

        return password_hash($password, PASSWORD_ARGON2ID, $options);
    }
    /**
     * Buscar nome, email e foto de usuário
     * @param int $id Identificação do Usuário
     * @return array|bool Dados retornados do usuário ou falso caso contrário
     */
    public function getUserData(int $id): array|bool
    {
        return $this->userModel->getUserInfo($id);
    }
    /**
     * Salvar imagem de perfil
     * @param array $profilePhoto Imagem cadastrada
     * @return bool|string Positivo se o registro for realizado e armazenado imagem pelo diretório e falso caso contrário
     */
    public function saveProfilePhoto(array $profilePhoto)
    {
        if ($profilePhoto['error'] !== UPLOAD_ERR_OK)
            return false;

        if ($profilePhoto['size'] > 5 * 1024 * 1024)
            return false;

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($profilePhoto['tmp_name']);
        $allowed = ['image/jpeg' => 'jpg', 'image/png' => 'png'];

        if (!\array_key_exists($mime, $allowed))
            return false;

        if (!getimagesize($profilePhoto['tmp_name']))
            return false;

        $ext = $allowed[$mime];
        $filename = uniqid('photo_', true) . '.' . $ext;

        $uploadDir = __DIR__ . '/../storage/uploads/images/';

        if (!is_dir($uploadDir))
            mkdir($uploadDir, 0755, true);

        if (!move_uploaded_file($profilePhoto['tmp_name'], $uploadDir . $filename))
            return false;

        return $filename;
    }
    /**
     * Registro de usuário
     * @param string $user_fullname Nome completo ou nickname
     * @param string $email E-mail
     * @param string $password Senha
     * @return bool Cadastro realizado com sucesso ou falha
     */
    public function createUser(string $user_fullname, string $email, string $password)
    {
  
        $this->validateEmptyFields($user_fullname, $email, $password);
        $this->validateUserEmail($email);
        $this->passwordValidation($password);

        $photoFileName = null;
        $profilePhoto = $_FILES['profilePhoto'] ?? null;

        if ($profilePhoto && $profilePhoto['error'] !== UPLOAD_ERR_NO_FILE) {
            $photoFileName = $this->saveProfilePhoto($profilePhoto);
            if ($photoFileName === false)
                return false;
        }

        $hashedPassword = $this->hashPassword($password);

        return $this->userModel->registerUser($user_fullname, $email, $hashedPassword, $photoFileName);
    }
    /**
     * Verificar email de usuário 
     * @param string $email E-mail
     * @return bool Positivo se e-mail for registrado e Falso caso contrário
     */
    public function checkUserByEmail(string $email): bool
    {
        return (bool) $this->userModel->getUserByEmail($email);
    }
    /**
     * Login de usuário
     * @param string $email E-mail
     * @param string $password Senha
     * @return bool Usuário autenticado com sucesso ou falha
     */
    public function login(string $email, string $password): bool
    {
        $user = $this->userModel->getUserByEmail($email);

        if(!$user or !password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['user_fullname'] = $user['user_fullname'];
        $_SESSION['email'] = $user['email'];

        return true;
    }
    /**
     * Verificação de ID ativo na sessão (Usuário logado)
     * @return bool Positivo se existir sessão ativa e logada e falso caso contrário
     */
    public function isLoggedIn(): bool
    {
        return isset($_SESSION['id']);
    }
}






