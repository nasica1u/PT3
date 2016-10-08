/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package physique;

/**
 *
 * @author Reed
 */
public class MoteurPhysique
{
    private final static double SOL=701;
    public boolean gauche=false;
    public boolean droite=false;
    public boolean haut=false;
    public boolean saut=false;
    
    public Monde m;
    
    public MoteurPhysique(Monde m)
    {
        this.m=m;
    }
    
    public void setEtat(int direction, boolean etat)
    {
        switch (direction) {
            case 0:
                gauche=etat;
                break;
            case 1:
                droite=etat;
                break;
            case 2:
                haut=etat;
                break;
            default:
                break;
        }
    }
    
    public boolean isTrue(int direction)
    {
        boolean resultat = false;
        switch (direction) {
            case 0:
                resultat=gauche;
                break;
            case 1:
                resultat=droite;
                break;
            case 2:
                resultat=haut;
                break;
            default:
                break;
        }
        return resultat;
    }
    
    public void update()
    {
        m.b.update();
        if(haut==true && gauche==true)
        {
            m.b.sauter();
            m.b.reculer();
        }
        else if(haut==true && droite==true)
        {
            m.b.sauter();
            m.b.avancer();
        }
        if(gauche==true) m.b.reculer();
        else if(droite==true) m.b.avancer();
        else if(haut==true) m.b.sauter();
    }
}
