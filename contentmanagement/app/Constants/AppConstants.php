<?php

namespace App\Constants;

class AppConstants
{
    public const USER_NOT_FOUND = "USER_NOT_FOUND";

    public const IS_NOT_ACTIVE = "IS_NOT_ACTIVE";

    public const SAVE_SUCCESS = "บันทึกข้อมูลสำเร็จ";

    public const DELETE_SUCCESS = "ลบข้อมูลสำเร็จ";

    public const ERROR_CONTACT_ADMIN  = "เกิดข้อผิดพลาดกรุณาติดต่อผู้ดูแลระบบ";

    public const ERROR_INVALID_FORMAT = "รูปแบบไม่ถูกต้อง";

    public const ERROR_DATA_IS_NOT_ACTIVE =  "ข้อมลถูกรับงับการใช้งาน";

    public const ERROR_DATA_NOT_FOUND = "ไม่พบข้อมูลนี้ในระบบ";

    public const ERROR_DATA_IS_DELETED = "ข้อมูลนี้ถูกลบออกจากระบบแล้ว";

    public const ERROR_DATA_IS_DUPLICATE = "ข้อมูลนี้ถูกใช้งานแล้วในระบบ";

    public const CAN_NOT_DELETE_DATA = "ไม่สามารถลบข้อมูลพนักงานได้เนื่องจากมีข้อมูลที่เกี่ยวข้องกับระบบดังนี้";

    public const HAVE_DATA_IN_SYSTEM = "มีข้อมูลในระบบ";

    public const CAN_DELETE_DATA = "สามารถลบข้อมูลได้";

    public const ERROR_SYS_TABLE_MAPPING_NOT_FOUND = "ERROR_SYS_TABLE_MAPPING_NOT_FOUND";

    public const ERROR_SYS_DOC_RUNNING_NOT_FOUND = "ERROR_SYS_DOC_RUNNING_NOT_FOUND";

    public const BASE_FORM_STATUS = ['0', '1', '2', '3'];

    public const BASE_FORM_APPROVE_STATUS = 1;

    public const BASE_FORM_WAIT_APPROVE_STATUS = 0;
}
