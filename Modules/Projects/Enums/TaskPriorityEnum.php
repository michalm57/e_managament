<?php

namespace Modules\Projects\Enums;

enum TaskPriorityEnum: string
{
    case LowPriority = 'low_priority';
    case MediumPriority = 'medium_priority';
    case HighPriority = 'high_priority';
    case HotFixPriority = 'hot_fix_priority';
}
