import { Component, OnInit } from '@angular/core';
import { DataService } from "../data.service";

@Component({
  selector: 'app-add-course',
  templateUrl: './add-course.component.html',
  styleUrls: ['./add-course.component.css']
})
export class AddCourseComponent implements OnInit {

  constructor(private data: DataService) { }

  ngOnInit() {
  }

  name : string;
  sks : number;
  error : string;

  AddCourse() {
    if (this.name != null && this.sks != null) {
      var lastId = this.data.CourseList[this.data.CourseList.length-1]['id'] + 1;
      var course = {'id' : lastId, 'name' : this.name, 'sks' : this.sks};
      this.data.CourseList.push(course);
      this.error = "Berhasil diinput";
    }
    else {
      this.error = "*Mohon cek kembali input Anda";
    }
  }

}
