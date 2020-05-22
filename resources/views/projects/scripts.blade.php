    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        const createProjectButton = document.querySelector('#create');
        const createProjectForm = document.querySelector('#create-project-form');
        const createTaskForm = document.querySelector('#create-task-form');
        const addTaskButton = document.querySelector('#add-task');

        createProjectButton.addEventListener('click', createProject);
        addTaskButton.addEventListener('click', addNewTaskField);

        function createProject (){
            createProjectForm.submit();
        };


        // Add new Field for task

        function addNewTaskField (){
            const div = document.createElement('div');
            div.classList.add('form-group');

            const input = document.createElement('input');
            input.classList.add('form-control');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'body');
            input.setAttribute('placeholder', 'New task');
            input.setAttribute('required', '');

            div.appendChild(input);

            createTaskForm.appendChild(div);
        };
    </script>
