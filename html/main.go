package main

import (
	"encoding/json"
	"html/template"
	"log"
	"net/http"
)

type User struct {
	ID        int    `json:"id"`
	Firstname string `json:"firstname"`
	Lastname  string `json:"lastname"`
	Mail      string `json:"mail"`
	Password  string `json:"password"`
	Company   bool   `json:"company"`
}

func main() {
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		resp, err := http.Get("http://127.0.0.1:8000/api/users") // Modifier l'URL en fonction de votre API
		if err != nil {
			log.Fatal(err)
		}
		defer resp.Body.Close()

		var users []User
		if err := json.NewDecoder(resp.Body).Decode(&users); err != nil {
			log.Fatal(err)
		}

		tmpl := template.Must(template.ParseFiles("users.html")) // Modifier le nom du fichier HTML en fonction de votre modèle
		if err := tmpl.Execute(w, users); err != nil {
			log.Fatal(err)
		}
	})

	log.Fatal(http.ListenAndServe(":8080", nil)) // Écoute sur le port 8080
}
