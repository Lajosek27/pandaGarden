<?php

require_once(_PS_ROOT_DIR_ . "/modules/pandamyprojects/classes/Project.php");

class AdminPandaMyProjectsController extends ModuleAdminControllerCore
{
    public function __construct()
    {
        $this->table = 'projects';
        $this->className = 'Project'; // Teraz klasa Project jest zdefiniowana
        $this->bootstrap = true; // Używamy Bootstrapa dla UI
        parent::__construct();
    }

    public function renderList()
    {
       
            // Pobierz projekty z bazy danych
            $projects = Db::getInstance()->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'projects');
        
            // Nagłówek tabeli
            $html = '<h3>' . $this->l('Projects List') . '</h3>';
            $html .= '<table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>' . $this->l('ID') . '</th>
                                <th>' . $this->l('Title') . '</th>
                                <th>' . $this->l('Description') . '</th>
                                <th>' . $this->l('Main Image') . '</th>
                                <th>' . $this->l('Actions') . '</th>
                            </tr>
                        </thead>
                        <tbody>';
        
            // Tworzenie wierszy dla każdego projektu
            foreach ($projects as $project) {
                $html .= '<tr>
                            <td>' . (int)$project['id_project'] . '</td>
                            <td>' . htmlspecialchars($project['title']) . '</td>
                            <td>' . htmlspecialchars($project['description']) . '</td>
                            <td>';
                if (!empty($project['image'])) {
                    $html .= '<img src="' . _PS_IMG_ . 'projects/' . htmlspecialchars($project['image']) . '" width="50" height="50" />';
                } else {
                    $html .= $this->l('No image');
                }
                $html .= '</td>
                          <td>
                              <a href="' . $this->context->link->getAdminLink('AdminPandaMyProjects') . '&id_project=' . (int)$project['id_project'] . '" class="btn btn-primary btn-sm">' . $this->l('Edit') . '</a>
                              <a href="' . $this->context->link->getAdminLink('AdminPandaMyProjects') . '&delete_project=' . (int)$project['id_project'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'' . $this->l('Are you sure you want to delete this project?') . '\');">' . $this->l('Delete') . '</a>
                          </td>
                        </tr>';
            }
        
            // Zamknięcie tabeli
            $html .= '</tbody></table>';
        
          
        
    
        // Przycisk, który rozwija formularz
        $html .= '<button type="button" class="btn btn-success" id="addNewProjectBtn">' . $this->l('Add New Project') . '</button>';
    
        // Dodaj formularz poniżej tabeli, domyślnie ukryty
        $html .= '<div id="newProjectForm" style="display:none;">';
        $html .= $this->renderForm();
        $html .= '</div>';
    
        // Dodaj JavaScript do rozwinięcia formularza
        $html .= '
            <script type="text/javascript">
                document.getElementById("addNewProjectBtn").addEventListener("click", function() {
                    var form = document.getElementById("newProjectForm");
                    if (form.style.display === "none") {
                        form.style.display = "block";
                    } else {
                        form.style.display = "none";
                    }
                });
            </script>
        ';
    
        return $html;
    }
    

    public function renderForm()
    {
        $id_project = Tools::getValue('id_project');
        $project = new Project($id_project); // Teraz możemy użyć klasy Project

        $this->fields_form = [
            'legend' => [
                'title' => $this->l('Add / Edit Project'),
            ],
            'input' => [
                [
                    'type' => 'text',
                    'label' => $this->l('Title'),
                    'name' => 'title',
                    'required' => true,
                    'value' => $project->title,
                ],
                [
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'value' => $project->description,
                ],
                [
                    'type' => 'file',
                    'label' => $this->l('Main Image'),
                    'name' => 'main_image',
                    'display_image' => true,
                    'image' => $project->image ? _PS_IMG_ . 'projects/' . $project->image : null,
                ],
            ],
            'submit' => [
                'title' => $this->l('Save'),
            ],
        ];

        return parent::renderForm();
    }

    // Możesz dodać obsługę formularza i zapis danych do bazy
    public function postProcess()
{
    if (Tools::isSubmit('submitAddproject')) {
        $id_project = Tools::getValue('id_project'); // Pobranie ID projektu, jeśli edytujemy istniejący projekt
        $title = Tools::getValue('title'); // Pobranie tytułu projektu
        $description = Tools::getValue('description'); // Pobranie opisu projektu
        $image = Tools::getValue('main_image'); // Pobranie obrazu głównego projektu

        // Tworzymy lub edytujemy obiekt klasy Project
        $project = new Project($id_project); // Jeśli istnieje $id_project, to edytujemy, w przeciwnym razie tworzymy nowy

        // Przypisujemy wartości do właściwości obiektu
        $project->title = pSQL($title); // Używamy pSQL do walidacji danych przed zapisaniem do bazy
        $project->description = pSQL($description);
        $project->image = $image; // Można tu dodać kod do obsługi przesyłania obrazu
        $project->date_add = date('Y-m-d H:i:s'); // Ustawiamy datę dodania

        // Zapisujemy projekt do bazy danych
        if ($project->save()) {
            Tools::redirectAdmin(self::$currentIndex . '&conf=4&token=' . $this->token); // Przekierowanie po zapisaniu
        } else {
            $this->errors[] = $this->l('An error occurred while saving the project.');
        }

       
    }

    if (isset($_FILES['main_image']) && !empty($_FILES['main_image']['tmp_name'])) {
        // Przesyłanie pliku (np. do katalogu _PS_IMG_ . 'projects/')
        $imagePath = $this->uploadImage($_FILES['main_image'], 'projects/');
        $project->image = $imagePath;
    }

    if (Tools::getValue('delete_project')) {
        $id_project = (int) Tools::getValue('delete_project');
        $project = new Project($id_project);
        if ($project->delete()) {
            Tools::redirectAdmin(self::$currentIndex . '&conf=1&token=' . $this->token);
        } else {
            $this->errors[] = $this->l('An error occurred while trying to delete the project.');
        }
    }
}

}
