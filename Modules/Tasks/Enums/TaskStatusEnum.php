<?php

namespace Modules\Tasks\Enums;

enum TaskStatusEnum: string
{
    case BackLogStatus = 'back_log_status';
    case ToDoStatus = 'to_do_status';
    case InProgressStatus = 'in_progress_status';
    case CodeDeploymentStatus = 'code_deployment_status';
    case TestsStatus = 'tests_status';
    case ReopenedStatus = 'reopened_status';
    case DoneStatus = 'done_status';
}
