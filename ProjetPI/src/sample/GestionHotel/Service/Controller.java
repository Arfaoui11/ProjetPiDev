package sample.GestionHotel.Service;


import com.itextpdf.text.*;
import com.itextpdf.text.pdf.CMYKColor;
import com.itextpdf.text.pdf.PdfWriter;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.collections.transformation.FilteredList;
import javafx.collections.transformation.SortedList;
import javafx.event.ActionEvent;
import javafx.fxml.Initializable;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.net.URL;
import java.sql.*;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;


import javafx.fxml.FXML;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;

import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;

import javafx.stage.FileChooser;
import javafx.stage.Stage;
import sample.GestionHotel.Entity.Hotel;


public class Controller implements Initializable {

    List<String> file;
    List<String> fileVid;
    String pathImg;
    String pathVideo;
    String chambre;
    @FXML
    private AnchorPane g;

    @FXML
    private TextField ch_sin;

    @FXML
    private TextField ch_triple;

    @FXML
    private TextField ch_double;

    @FXML
    private TextField filtrage_bad;
    @FXML
    private TextField Nom_hotel_bad;

    @FXML
    private TextField Etoilet_hotel_bad;

    @FXML
    private TableView<Hotel> tvhHotel_bad;

    @FXML
    private TableColumn<Hotel, Integer> col_Id_bad;

    @FXML
    private TableColumn<Hotel, String> col_nom_bad;

    @FXML
    private TableColumn<Hotel, String> col_chambre_bad;

    @FXML
    private TableColumn<Hotel, String> col_heb_bad;

    @FXML
    private TableColumn<Hotel, String> col_lieu_bad;

    @FXML
    private TableColumn<Hotel, Integer> col_etoile_bad;

    @FXML
    private Button btnupdate_bad;

    @FXML
    private Button btndelete_bad;

    @FXML
    private TextField Lieu_Hotel_bad;
    @FXML
    private Label Id_hotel_bad;


    @FXML
    private TextArea Heb_hotel_bad;

    @FXML
    private Button btninsert_bad;

    @FXML
    private TableColumn<Hotel, String> col_img;

    @FXML
    private TableColumn<Hotel, String> col_vid;


    @FXML
    private CheckBox cb1;

    @FXML
    private CheckBox cb2;

    @FXML
    private CheckBox cb3;

    @FXML
    private CheckBox cb4;
    private Hotel c;


    @FXML
    private TableColumn<Hotel, Integer> col_ind;

    @FXML
    private TableColumn<Hotel, Integer> col_doub;


    @FXML
    private TableColumn<Hotel, Integer> col_trip;


    @Override
    public void initialize(URL url, ResourceBundle resourceBundle) {
        showhotel();

        file = new ArrayList<>();
        file.add("*.doc");
        file.add("*.png");
        file.add("*.jpeg");
        file.add("*.jpg");

        fileVid = new ArrayList<>();
        fileVid.add("*.mp3");
        fileVid.add("*.mp4");
        fileVid.add("*.wmv");
        fileVid.add("*.avi");
        fileVid.add("*.mkv");
        fileVid.add("*.flv");
        search_hotel();


    }


    private void insertRecord() {
        String query = "INSERT INTO hotel VALUES('" + random_id() + "','" + Nom_hotel_bad.getText() + "'," + Etoilet_hotel_bad.getText() + ",'" + Heb_hotel_bad.getText() + "','" + Lieu_Hotel_bad.getText() + "','" + pathImg + "','" + pathVideo + "','" + chambre + "'," + ch_sin.getText() + "," + ch_double.getText() + "," + ch_triple.getText() + " )";
        executeQuery(query);
        showhotel();
        search_hotel();
    }


    private void executeQuery(String query) {
        Connection conn = getConnection();
        Statement st;
        try {
            st = conn.createStatement();
            st.executeUpdate(query);
        } catch (Exception ex) {
            ex.printStackTrace();
        }
    }


    @FXML
    void ajouter(ActionEvent event) {
        if (event.getSource() == btninsert_bad) {
            insertRecord();
        } else if (event.getSource() == btnupdate_bad) {
            update();
        } else if (event.getSource() == btndelete_bad) {
            delete();
        }

    }


    public Connection getConnection() {
        Connection conn;
        try {
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/gestion_hotel", "root", "");
            return conn;
        } catch (Exception ex) {
            System.out.println("Error :" + ex.getMessage());
            return null;
        }
    }


    public ObservableList<Hotel> getHotelList() {
        ObservableList<Hotel> hotelList = FXCollections.observableArrayList();
        Connection conn = getConnection();
        String query = "SELECT * FROM hotel";
        Statement st;
        ResultSet rs;
        try {
            st = conn.createStatement();
            rs = st.executeQuery(query);
            Hotel hotel;
            while (rs.next()) {
                hotel = new Hotel(rs.getString("id"), rs.getString("nom"), rs.getInt("etoile"), rs.getString("lieu"), rs.getString("hebergement"), rs.getString("Path_image"), rs.getString("Path_video"), rs.getString("chambre"), rs.getInt("ch_In"), rs.getInt("ch_db"), rs.getInt("ch_tr"));
                hotelList.add(hotel);
            }
        } catch (Exception ex) {
            ex.printStackTrace();
        }
        return hotelList;
    }


    public void showhotel() {
        ObservableList<Hotel> list = getHotelList();
        col_Id_bad.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("id"));
        col_nom_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("nom"));
        col_etoile_bad.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("etoile"));
        col_heb_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("hebergement"));
        col_lieu_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("lieu"));
        col_img.setCellValueFactory(new PropertyValueFactory<Hotel, String>("Path_image"));
        col_vid.setCellValueFactory(new PropertyValueFactory<Hotel, String>("Path_video"));
        col_chambre_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("chambre"));
        col_ind.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_sing"));
        col_doub.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_doub"));
        col_trip.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_trip"));


        tvhHotel_bad.setItems(list);
    }


    private void update() {

        Hotel H = tvhHotel_bad.getSelectionModel().getSelectedItem();


        String query = "UPDATE hotel SET id=" + Id_hotel_bad.getText() + ",nom='" + Nom_hotel_bad.getText() + "',etoile=" + Etoilet_hotel_bad.getText() + ",hebergement='" + Heb_hotel_bad.getText() + "',lieu='" + Lieu_Hotel_bad.getText() + "',ch_sing=" + ch_sin.getText() + ",ch_doub=" + ch_double.getText() + ",ch_trip=" + ch_triple.getText() + "         WHERE id = " + H.getId() + " ";
        executeQuery(query);
        showhotel();
        search_hotel();
    }


    private void delete() {
        Hotel H = tvhHotel_bad.getSelectionModel().getSelectedItem();


        String query = "DELETE FROM hotel WHERE id ='" + H.getId() + "'";
        executeQuery(query);
        showhotel();
    }


    @FXML
    void ajouterImg(ActionEvent event) {
        FileChooser fc = new FileChooser();
        fc.getExtensionFilters().add(new FileChooser.ExtensionFilter("Image Files", file));
        File f = fc.showOpenDialog(null);
        if (f != null) {
            pathImg = f.toString();
        }
    }


    @FXML
    void ajouterVid(ActionEvent event) {

        FileChooser fc = new FileChooser();
        fc.getExtensionFilters().add(new FileChooser.ExtensionFilter("Vido Files", fileVid));
        File f = fc.showOpenDialog(null);
        if (f != null) {
            pathVideo = f.toString();
        }
    }


    @FXML
    void checkbox(ActionEvent event) {


        if (cb1.isSelected()) {

            chambre = cb1.getText() + " ";

        }
        if (cb2.isSelected()) {

            chambre = cb2.getText() + " ";

        }
        if (cb3.isSelected()) {

            chambre = cb3.getText() + " ";

        }
        if (cb4.isSelected()) {

            chambre = cb4.getText() + " ";
        }
    }


    ObservableList<Hotel> dataList;

    void search_hotel() {
        col_Id_bad.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("id"));
        col_nom_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("nom"));
        col_etoile_bad.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("etoile"));
        col_heb_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("hebergement"));
        col_lieu_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("lieu"));
        col_img.setCellValueFactory(new PropertyValueFactory<Hotel, String>("Path_image"));
        col_vid.setCellValueFactory(new PropertyValueFactory<Hotel, String>("Path_video"));
        col_chambre_bad.setCellValueFactory(new PropertyValueFactory<Hotel, String>("chambre"));
        col_ind.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_sing"));
        col_doub.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_doub"));
        col_trip.setCellValueFactory(new PropertyValueFactory<Hotel, Integer>("ch_trip"));


        dataList = getHotelList();
        tvhHotel_bad.setItems(dataList);

        FilteredList<Hotel> filteredList = new FilteredList<>(dataList, b -> true);
        filtrage_bad.textProperty().addListener(((observableValue, oldValue, newValue) ->
        {
            filteredList.setPredicate(hotel ->
            {
                if (newValue == null || newValue.isEmpty()) {
                    return true;

                }
                String lowerCaseFilter = newValue.toLowerCase();

                if (String.valueOf(hotel.getId()).indexOf(lowerCaseFilter) != -1) {
                    return true;

                } else if (hotel.getNom().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true;

                }
                if (String.valueOf(hotel.getEtoile()).indexOf(lowerCaseFilter) != -1) {
                    return true;
                } else if (hotel.getLieu().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true;

                } else if (String.valueOf(hotel.getPath_image()).indexOf(lowerCaseFilter) != -1) {
                    return true;

                } else if (String.valueOf(hotel.getPath_video()).indexOf(lowerCaseFilter) != -1) {
                    return true;

                } else if (hotel.getChambre().toLowerCase().indexOf(lowerCaseFilter) != -1) {
                    return true;
                } else
                    return false;


            });
        }));

        SortedList<Hotel> sortedList = new SortedList<>(filteredList);
        sortedList.comparatorProperty().bind(tvhHotel_bad.comparatorProperty());
        tvhHotel_bad.setItems(sortedList);


    }

    @FXML
    private void mousebtn(MouseEvent event) {
        Hotel hotel = tvhHotel_bad.getSelectionModel().getSelectedItem();
        Id_hotel_bad.setText("" + hotel.getId());
        Nom_hotel_bad.setText(hotel.getNom());
        Heb_hotel_bad.setText("" + hotel.getHebergement());
        Lieu_Hotel_bad.setText("" + hotel.getLieu());
        Etoilet_hotel_bad.setText("" + hotel.getEtoile());
        ch_sin.setText("" + hotel.getCh_sing());
        ch_double.setText("" + hotel.getCh_doub());
        ch_triple.setText("" + hotel.getCh_trip());


    }

    public String random_id() {

        Random random = new Random();

        String generatedString = random.ints(6, 65, 90)
                .collect(StringBuilder::new, StringBuilder::appendCodePoint, StringBuilder::append)
                .toString();


        return generatedString;
    }


    //////////pdf





    @FXML
    void Imprimer(ActionEvent event) {

    }

     void imprimer1(Hotel c) throws FileNotFoundException {
        com.itextpdf.text.Document doc = new Document();
        FileChooser fc = new FileChooser();
        fc.getExtensionFilters().add(new FileChooser.ExtensionFilter("PDF File", "*.pdf"));
        fc.setTitle("save contract");
        fc.setInitialFileName("untitled.pdf");
        Stage stage = (Stage) g.getScene().getWindow();
        File file = fc.showSaveDialog(stage);
        if (file != null) {
            String str = file.getAbsolutePath();
            try {
                Font blueFont = FontFactory.getFont(FontFactory.HELVETICA, 16, Font.NORMAL, new CMYKColor(255, 0, 0, 0));
                Font blackFont = FontFactory.getFont(FontFactory.HELVETICA, 9, Font.NORMAL, new CMYKColor(255, 255, 255, 255));
                PdfWriter.getInstance(doc, new FileOutputStream(str));
                doc.open();
                Paragraph p = new Paragraph("                                                         Contrat", blueFont);
                doc.add(p);

                Paragraph contenu = new Paragraph(preparerMsg(c), blackFont);
                doc.add(contenu);
                doc.close();
            } catch (DocumentException ex) {
                Logger.getLogger(Controller.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }


    private String preparerMsg(Hotel c) {
        String ch="\n \n \n  Entre les soussignes:\n \n"
                + "D une part:\n \n"
                + "Ecole: "+c.getNom() +"\n \n"
                + "Et D autre part: \n \n"
                + "Centre: "+c.getHebergement() +"\n \n \n \n"
                + "Dans le cadre de l amelioration des formations academiques, les deux etablissement mentionne ci dessus ont signe ce contrat"
                + " qui annonce la planification d une formation dans le domaine: "+c.getLieu()+" pour un prix "+c.getNom()+" DNT\n \n "

                + "Signature Ecole                                       Signature Centre";
        return ch;
    }











}
