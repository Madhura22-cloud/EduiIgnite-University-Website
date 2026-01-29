package com.eduignite.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.eduignite.model.ContactForm;
import com.eduignite.repository.ContactFormRepository;

@RestController
@RequestMapping("/api")
@CrossOrigin(origins = "*")  // optional if frontend served from another origin
public class ContactController {

    @Autowired
    private ContactFormRepository contactFormRepository;

    @PostMapping("/contact")
    public ResponseEntity<String> submitContact(@RequestBody ContactForm form) {
        contactFormRepository.save(form);  // saves to DB
        return ResponseEntity.ok("Message sent successfully!");
    }
}
